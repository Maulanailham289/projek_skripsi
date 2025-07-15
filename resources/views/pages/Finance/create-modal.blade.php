<!-- Modal wrapper -->
<div id="popup-create" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[80vh] overflow-y-auto">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Data Produk
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="popup-create">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5" action="/ekspor" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">

                    <!-- Nama Produk -->
                    <div class="col-span-2">
                        <label for="nama_produk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                        <select name="nama_produk" id="nama_produk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                            <option value="" disabled selected>Pilih nama produk</option>
                            <option value="vanili">Vanili</option>
                            <option value="cengkeh">Cengkeh</option>
                            <option value="kopi_jawa">Kopi Jawa</option>
                        </select>
                    </div>

                    <!-- Kategori -->
                    <div class="col-span-2">
                        <label for="kategori_produk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
                        <select name="kategori_produk" id="kategori_produk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="cengkeh">Rempah-rempah</option>
                        </select>
                    </div>

                    <!-- Harga -->
                    <div class="col-span-2">
                        <label for="biaya_produksi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga (Rp)</label>
                        <input type="number" name="biaya_produksi" id="biaya_produksi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Contoh: 100000000" required>
                    </div>

                    <!-- Komoditas -->
                    <div class="col-span-2">
                        <label for="nama_komoditas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk</label>
                        <textarea name="nama_komoditas" id="nama_komoditas" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Masukkan deskripsi produk" required></textarea>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full mt-2 text-white inline-flex items-center justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah Data Produk
                </button>
            </form>
        </div>
    </div>
</div>