@extends('welcome')
@section('content')
    <!-- Button Create -->
    <button data-modal-target="popup-create" data-modal-toggle="popup-create"
        class="block my-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Create Data Ekspor
    </button>

    @include('alerts.success')

    <!-- Include Create Modal -->
    @include('pages.ekspor.create-modal', ['customers' => $customers, 'products' => $products])

    <!-- Table Ekspor -->
    <div class="grid grid-cols-1 gap-4 mb-4">
        <div class="flex items-center justify-evenly p-10 rounded-lg shadow-sm shadow-gray-500 bg-white dark:bg-gray-800">
            <table id="pagination-table" class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th>Tanggal Ekspor</th>
                        <th>Nama Customer</th>
                        <th>Negara Tujuan</th>
                        <th>Komoditas</th>
                        <th>Volume Ekspor</th>
                        <th>Harga Awal</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listExports as $list)
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <td>{{ $list->export_date }}</td>
                            <td>{{ $list->customer->name ?? '-' }}</td>
                            <td>{{ $list->country }}</td>
                            <td>{{ $list->product->name ?? '-' }}</td>
                            <td>{{ $list->volume }} kg</td>
                            <td>Rp{{ number_format($list->price, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($list->net_profit, 0, ',', '.') }}</td>
                            <td>
                                <div class="flex">
                                    <button data-modal-target="popup-edit-{{ $list->id }}"
                                            data-modal-toggle="popup-edit-{{ $list->id }}"
                                            class="mx-1 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-4 py-2">
                                        Edit
                                    </button>
                                    <button data-modal-target="popup-delete-{{ $list->id }}"
                                            data-modal-toggle="popup-delete-{{ $list->id }}"
                                            class="mx-1 text-white bg-red-600 hover:bg-red-700 rounded-lg text-sm px-4 py-2">
                                        Delete
                                    </button>
                                </div>

                                @include('pages.ekspor.edit-modal', ['list' => $list])
                                @include('pages.ekspor.delete-modal', ['list' => $list])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#pagination-table", {
                paging: true,
                perPage: 5,
                perPageSelect: [5, 10, 15, 20, 25],
                sortable: false
            });
        }
    </script>
@endsection
