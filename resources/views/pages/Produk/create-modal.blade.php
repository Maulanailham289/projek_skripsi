<!-- Modal wrapper -->
<div id="popup-create" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[80vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Produk Baru
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="popup-create">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Form -->
            <form class="p-4 md:p-5" action="{{ route('produk.create') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4">
                    <!-- Nama Produk -->
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                        <input type="text" name="name" id="name" required
                            placeholder="Contoh: Vanili, Cengkeh"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                    </div>

                    <!-- Kategori Produk -->
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="category" id="category" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Rempah">Rempah</option>
                        </select>
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga (Rp)</label>
                        <input type="number" name="price" id="price" required
                            placeholder="Contoh: 100000"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Simpan Produk
                </button>
            </form>
        </div>
    </div>
</div>
