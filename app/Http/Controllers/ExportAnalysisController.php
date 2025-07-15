<?php

namespace App\Http\Controllers;
use App\Models\Export;
use Illuminate\Http\Request;

class ExportAnalysisController extends Controller
{
    public function index()
    {
        $exports = Export::with(['product', 'customer'])
            ->orderBy('export_date', 'desc')
            ->paginate(20);

        return view('pages.Analisis-Efisiensi-Pasar.index', compact('exports'));
    }

    public function analyze()
    {
        $exports = Export::with('product')->get();

        if ($exports->count() < 2) {
            return back()->with('error', 'You need at least 2 export records to perform DEA analysis.');
        }

        // Prepare data for DEA
        $exportData = [];
        foreach ($exports as $export) {
            $exportData[$export->id] = [
                'product_name' => $export->product->name,
                'inputs' => [$export->price], // Input: Price
                'outputs' => [$export->volume, $export->net_profit], // Outputs: Volume and Net Profit
                'export' => $export // Keep original data
            ];
        }

        // Calculate efficiency scores
        $efficiencyScores = [];
        foreach ($exportData as $exportId => $targetData) {
            $maxEfficiency = 0;

            // Find maximum efficiency ratio among all exports
            foreach ($exportData as $comparisonData) {
                $input = $comparisonData['inputs'][0];
                if ($input > 0) {
                    $efficiency = (
                        $comparisonData['outputs'][0] + // Volume
                        $comparisonData['outputs'][1]   // Net Profit
                    ) / $input;

                    $maxEfficiency = max($maxEfficiency, $efficiency);
                }
            }

            // Calculate target efficiency
            $targetInput = $targetData['inputs'][0];
            $targetEfficiency = 0;

            if ($targetInput > 0) {
                $targetEfficiency = (
                    $targetData['outputs'][0] +
                    $targetData['outputs'][1]
                ) / $targetInput;
            }

            // Normalize score
            $efficiencyScores[$exportId] = $maxEfficiency > 0
                ? $targetEfficiency / $maxEfficiency
                : 0;
        }

        return view('pages.Analisis-Efisiensi-Pasar.analyze', [
            'exports' => $exports,
            'efficiencyScores' => $efficiencyScores
        ]);
    }

    public function prhitungan()
    {
        $exports = Export::with('product')->get();

        if ($exports->count() < 2) {
            return back()->with('error', 'Minimum 2 data ekspor diperlukan untuk analisis DEA');
        }

        $calculationSteps = [];
        $efficiencyScores = [];

        foreach ($exports as $target) {
            $step = [
                'target' => $target,
                'comparisons' => [],
                'max_efficiency' => 0,
                'target_efficiency' => 0,
                'normalized_score' => 0
            ];

            foreach ($exports as $comparison) {
                $input = $comparison->price;
                $output = $comparison->volume + $comparison->net_profit;

                $efficiency = ($input != 0) ? $output / $input : 0;

                $step['comparisons'][] = [
                    'comparison' => $comparison,
                    'formula' => "($comparison->volume + $comparison->net_profit) / $comparison->price",
                    'result' => $efficiency
                ];

                $step['max_efficiency'] = max($step['max_efficiency'], $efficiency);
            }

            $targetInput = $target->price;
            $targetOutput = $target->volume + $target->net_profit;

            $step['target_efficiency'] = ($targetInput != 0) ? $targetOutput / $targetInput : 0;
            $step['normalized_score'] = ($step['max_efficiency'] != 0)
                ? $step['target_efficiency'] / $step['max_efficiency']
                : 0;

            $step['target_formula'] = "($target->volume + $target->net_profit) / $target->price";

            $calculationSteps[$target->id] = $step;
            $efficiencyScores[$target->id] = $step['normalized_score'];
        }

        return view('pages.Analisis-Efisiensi-Pasar.dea-calculation', [
            'calculationSteps' => $calculationSteps,
            'efficiencyScores' => $efficiencyScores
        ]);
    }
}
