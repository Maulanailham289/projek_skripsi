@extends('welcome')

@section('content')
<div class="container mx-auto px-4">
    <!-- Heading -->
    <h1 class="text-2xl font-bold text-green-700 dark:text-green-300 mb-4">
        Analisis Efisiensi Ekspor (Metode DEA)
    </h1>

    <!-- Info Alert -->
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
        <p><strong>Input DEA:</strong> Harga (Price)</p>
        <p><strong>Output DEA:</strong> Volume dan Laba Bersih (Net Profit)</p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300 border rounded-lg shadow">
            <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-700">
                <tr>
                    <th class="px-6 py-3">Produk</th>
                    <th class="px-6 py-3">Volume</th>
                    <th class="px-6 py-3">Harga</th>
                    <th class="px-6 py-3">Laba Bersih</th>
                    <th class="px-6 py-3">Skor Efisiensi</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach($exports as $export)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $export->product->name }}
                    </td>
                    <td class="px-6 py-4">{{ number_format($export->volume, 2) }}</td>
                    <td class="px-6 py-4">{{ number_format($export->price, 2) }}</td>
                    <td class="px-6 py-4">{{ number_format($export->net_profit, 2) }}</td>
                    <td class="px-6 py-4">{{ number_format($efficiencyScores[$export->id], 4) }}</td>
                    <td class="px-6 py-4">
                        @if($efficiencyScores[$export->id] >= 0.9999)
                            <span class="inline-block px-3 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">
                                Efisien
                            </span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">
                                Tidak Efisien
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Back Button -->
    <div class="mt-6 text-right">
        <a href="{{ route('exports.index') }}"
           class="inline-block px-5 py-2 bg-green-600 text-white text-sm font-semibold rounded hover:bg-green-700">
            ← Kembali ke Daftar Ekspor
        </a>
    </div>
</div>
@endsection
