@extends('welcome')

@section('content')
    <button data-modal-target="popup-create" data-modal-toggle="popup-create"
        class="block my-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Create Data Pelanggan
    </button>

    @include('alerts.success')
    @include('pages.Customer.create-modal')

    <div class="grid grid-cols-1 gap-4 mb-4">
        <div class="flex items-center justify-evenly p-10 rounded-lg shadow-sm shadow-gray-500 bg-white dark:bg-gray-800">
            <table id="pagination-table">
                <thead>
                    <tr>
                        <th><span class="flex items-center">NO</span></th>
                        <th><span class="flex items-center">Nama</span></th>
                        <th><span class="flex items-center">Contact</span></th>
                        <th><span class="flex items-center">Negara</span></th>
                        <th><span class="flex items-center">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCustomer as $list)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->contact }}</td>
                            <td>{{ $list->country ?? '-' }}</td>
                            <td>
                                <div class="flex">
                                    <button data-modal-target="popup-edit-{{ $list->id }}"
                                            data-modal-toggle="popup-edit-{{ $list->id }}"
                                            class="mx-1 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-4 py-2">
                                        Edit
                                    </button>
                                    <button data-modal-target="popup-delete-{{ $list->id }}"
                                        data-modal-toggle="popup-delete-{{ $list->id }}"
                                        class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                            </td>
                            @include('pages.customer.edit-modal', ['list' => $list])
                            @include('pages.customer.delete-modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex items-center justify-center mb-4 rounded bg-blue-700">
        {{-- Placeholder if needed --}}
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
