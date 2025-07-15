<!-- Modal wrapper -->
<div id="popup-edit-{{ $list->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Ekspor
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-edit-{{ $list->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('ekspor.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $list->id }}">

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="tanggal_ekspor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Ekspor</label>
                            <input type="date" name="tanggal_ekspor" id="tanggal_ekspor" value="{{ $list->export_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                        </div>

                        <div class="col-span-2">
                            <label for="customer_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
                            <select name="customer_id" id="customer_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $customer->id == $list->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="negara_tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Negara Tujuan</label>
                            <input type="text" name="negara_tujuan" id="negara_tujuan" value="{{ $list->country }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                        </div>

                        <div class="col-span-2">
                            <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komoditas</label>
                            <select name="product_id" id="product_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $list->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="volume_ekspor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Volume Ekspor (kg)</label>
                            <input type="number" name="volume_ekspor" id="volume_ekspor" value="{{ $list->volume }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" step="0.01" required>
                        </div>

                        <div class="col-span-2">
                            <label for="biaya_produksi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Awal (Rp)</label>
                            <input type="number" name="biaya_produksi" id="biaya_produksi" value="{{ $list->price }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                        </div>

                        <div class="col-span-2">
                            <label for="laba_bersih" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laba Bersih (Rp)</label>
                            <input type="number" name="laba_bersih" id="laba_bersih" value="{{ $list->net_profit }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Data Ekspor
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
