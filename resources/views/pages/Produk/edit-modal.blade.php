<!-- Modal Edit Produk -->
<div id="popup-edit-{{ $product->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[80vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Produk
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-edit-{{ $product->id }}">
                    <svg class="w-3 h-3" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <div class="p-4 md:p-5">
                <form action="{{ route('produk.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            <option value="Rempah" {{ $product->category === 'Rempah' ? 'selected' : '' }}>Rempah</option>
                            {{-- Tambah kategori lain jika ada --}}
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga (Rp)</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                    </div>

                    <button type="submit"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
