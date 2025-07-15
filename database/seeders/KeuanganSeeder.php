<?php

namespace Database\Seeders;
use App\Models\Finance;
use App\Models\Export;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ekspors = Export::all();

        foreach ($ekspors as $ekspor) {
            Finance::create([
                'export_id' => $ekspor->id,
                'cost' => 60000000,
                'income' => 100000000,
                'efficiency' => 0.85,
            ]);
        }
    }
}
