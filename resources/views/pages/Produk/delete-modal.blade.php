<!-- Modal delete untuk setiap produk -->
<div id="popup-delete-{{ $product->id }}" tabindex="-1"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[80vh] overflow-y-auto">
            <!-- Close Button -->
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-delete-{{ $product->id }}">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Yakin ingin menghapus produk <strong>{{ $product->name }}</strong>?
                </h3>
                <form action="{{ route('produk.delete', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                        Ya, Hapus
                    </button>
                    <button type="button" data-modal-hide="popup-delete-{{ $product->id }}"
                        class="ml-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 px-5 py-2.5">
                        Batal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
