<!-- Modal wrapper -->
<div id="popup-create" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[80vh] overflow-y-auto">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Data Pelanggan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="popup-create">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('customer.create') }}" method="POST" class="p-4 space-y-4">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Nama -->
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Pelanggan
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="Nama pelanggan" required>
                    </div>

                    <!-- Contact -->
                    <div class="col-span-2">
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Contact
                        </label>
                        <input type="text" name="contact" id="contact"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="Nomor HP / Kontak" required>
                    </div>

                    <!-- Negara -->
                    <div class="col-span-2">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Negara
                        </label>
                        <input type="text" name="country" id="country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="Negara asal pelanggan" required>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Tambah Pelanggan
                </button>
            </form>
        </div>
    </div>
</div>
