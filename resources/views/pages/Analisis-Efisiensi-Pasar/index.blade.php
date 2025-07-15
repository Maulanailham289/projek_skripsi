@extends('welcome')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Export Records</h1>

    <div class="mb-4 flex gap-x-2">
        <!-- Tombol Kiri -->
        <a href="{{ route('exports.analyze') }}"
            class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded hover:bg-green-700">
            Analisis Efisiensi Ekspor (DEA)
        </a>

        <!-- Tombol Kanan -->
        <a href="{{ route('exports.perhitungan') }}"
            class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded hover:bg-green-700">
            Detail Perhitungan Analisis Efisiensi Ekspor (DEA)
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Country</th>
                    <th class="px-4 py-3">Volume</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Net Profit</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach($exports as $export)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($export->export_date)->format('Y-m-d') }}
                    </td>
                    <td class="px-4 py-3">{{ $export->product->name }}</td>
                    <td class="px-4 py-3">{{ $export->customer->name }}</td>
                    <td class="px-4 py-3">{{ $export->country }}</td>
                    <td class="px-4 py-3">{{ number_format($export->volume, 2) }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($export->price, 2) }}</td>
                    <td class="px-4 py-3 text-green-600 dark:text-green-400">Rp {{ number_format($export->net_profit, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $exports->links('pagination::tailwind') }}
    </div>
</div>
@endsection
