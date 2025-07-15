<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                    <i class="fas fa-gauge text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Start User Management --}}
                <li>
                    <a href="/Customer"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                        <i class="fas fa-users-cog text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Kelola Data Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="/Ekspor"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                        <i class="fas fa-box-open text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Kelola Data Ekspor</span>
                    </a>
                </li>
                <li>
                    <a href="/produk"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                        <i class="fas fa-bottle-water text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Kelola Data Produk</span>
                    </a>
                </li>
                <li>
                <a href="/perhitungan"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                    <i class="fas fa-chart-line text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Analisis Efisiensi Pasar</span>
                </a>
            </li>
            <li>
                <a href="/contact-management"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-green-700 group">
                    <i class="fas fa-coins text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white w-5 h-5"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kelola Data Keuangan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
