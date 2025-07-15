@extends('welcome')
@section('content')

<!-- Dashboard Cards -->
<div class="grid grid-cols-2 gap-4 mb-8">
    <!-- Card 1 - Jumlah Produk -->
    <div class="flex items-center justify-evenly h-56 rounded-xl bg-green-100 dark:bg-green-900 shadow-md">
        <div class="p-4 bg-green-600 rounded-full shadow-lg">
            <i class="fas fa-box text-white text-3xl"></i>
        </div>
        <div class="px-4 text-gray-800 dark:text-white">
            <h3 class="md:text-lg tracking-wider font-semibold">Jumlah Produk</h3>
            <p class="md:text-3xl font-bold">{{ $countProducts }}</p>
        </div>
    </div>

    <!-- Card 2 - Jumlah Pelanggan -->
    <div class="flex items-center justify-evenly h-56 rounded-xl bg-green-100 dark:bg-green-900 shadow-md">
        <div class="p-4 bg-green-600 rounded-full shadow-lg">
            <i class="fas fa-users text-white text-3xl"></i>
        </div>
        <div class="px-4 text-gray-800 dark:text-white">
            <h3 class="md:text-lg tracking-wider font-semibold">Jumlah Pelanggan</h3>
            <p class="md:text-3xl font-bold">{{ $countCustomers }}</p>
        </div>
    </div>
</div>

<!-- Line Chart Section -->
<div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-4">Laporan Keuangan</h2>
    <canvas id="financialChart" height="100"></canvas>
</div>

<!-- Font Awesome & Chart.js CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Chart Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('financialChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // contoh data dinamis
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [1000000, 1200000, 900000, 1500000, 1100000, 1400000], // data dummy
                    fill: true,
                    backgroundColor: 'rgba(34, 197, 94, 0.2)',
                    borderColor: 'rgb(34, 197, 94)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#4B5563'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#4B5563' }
                    },
                    y: {
                        ticks: { color: '#4B5563' },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
