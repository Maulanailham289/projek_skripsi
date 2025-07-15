@extends('welcome')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Header + Tombol Kembali -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Detail Perhitungan DEA</h2>
            <a href="{{ route('exports.index') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm font-semibold">
                ← Kembali
            </a>
        </div>

        <!-- Parameter DEA -->
        <div class="bg-green-100 border-l-4 border-green-600 text-green-800 p-6 rounded mb-6 shadow">
            <h3 class="text-lg font-bold mb-2">Parameter DEA</h3>
            <ul class="list-disc pl-5 space-y-1">
                <li><span class="font-semibold">Input:</span> Harga (Price)</li>
                <li><span class="font-semibold">Output:</span> Volume dan Laba Bersih (Net Profit)</li>
                <li><span class="font-semibold">Rumus Efisiensi:</span> (Volume + Net Profit) / Harga</li>
            </ul>
        </div>

        <!-- Perhitungan DEA per Produk -->
        @foreach($calculationSteps as $exportId => $step)
        <div class="bg-white shadow rounded-lg mb-6 border-l-4 border-green-500">
            <div class="p-4 bg-green-50 flex justify-between items-center border-b border-green-200">
                <h3 class="text-lg font-bold text-gray-800">
                    Perhitungan: {{ $step['target']->product->name }}
                </h3>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $step['normalized_score'] >= 0.9999 ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                    Skor: {{ number_format($step['normalized_score'], 4) }}
                </span>
            </div>

            <div class="p-6 space-y-6">

                <!-- Bandingkan -->
                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">1. Bandingkan dengan Semua Produk:</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm divide-y divide-gray-200">
                            <thead class="bg-gray-100 text-xs font-semibold text-gray-600 uppercase">
                                <tr>
                                    <th class="px-6 py-3 text-left">Produk</th>
                                    <th class="px-6 py-3 text-left">Rumus</th>
                                    <th class="px-6 py-3 text-left">Efisiensi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($step['comparisons'] as $comparison)
                                <tr>
                                    <td class="px-6 py-4">{{ $comparison['comparison']->product->name }}</td>
                                    <td class="px-6 py-4 font-mono">{{ $comparison['formula'] }}</td>
                                    <td class="px-6 py-4">{{ number_format($comparison['result'], 4) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Maksimum -->
                <div class="bg-gray-100 p-3 rounded">
                    <p class="text-sm font-medium text-gray-700">
                        <strong>Efisiensi Maksimum:</strong>
                        <span class="font-mono">{{ number_format($step['max_efficiency'], 4) }}</span>
                    </p>
                </div>

                <!-- Target -->
                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">2. Hitung Target:</h4>
                    <div class="bg-gray-50 p-3 rounded font-mono text-sm">
                        {{ $step['target_formula'] }} = {{ number_format($step['target_efficiency'], 4) }}
                    </div>
                </div>

                <!-- Normalisasi -->
                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">3. Normalisasi Skor:</h4>
                    <div class="bg-gray-50 p-3 rounded font-mono text-sm">
                        {{ number_format($step['target_efficiency'], 4) }} / {{ number_format($step['max_efficiency'], 4) }}
                        = <strong>{{ number_format($step['normalized_score'], 4) }}</strong>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Ringkasan -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="p-4 bg-green-600 text-white font-bold rounded-t-md">
                Ringkasan Hasil DEA
            </div>
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-6 py-3 text-left">Produk</th>
                            <th class="px-6 py-3 text-left">Skor DEA</th>
                            <th class="px-6 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($calculationSteps as $exportId => $step)
                        <tr>
                            <td class="px-6 py-4">{{ $step['target']->product->name }}</td>
                            <td class="px-6 py-4">{{ number_format($step['normalized_score'], 4) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $step['normalized_score'] >= 0.9999 ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                    {{ $step['normalized_score'] >= 0.9999 ? 'Efisien' : 'Tidak Efisien' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali Bawah -->
        <div class="text-right mt-6">
            <a href="{{ route('exports.index') }}"
               class="inline-block px-5 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 font-semibold text-sm">
                ← Kembali ke Daftar Ekspor
            </a>
        </div>
    </div>
</div>
@endsection
