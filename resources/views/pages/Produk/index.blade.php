@extends('welcome')

@section('content')
<!-- Button Create -->
<button data-modal-target="popup-create" data-modal-toggle="popup-create"
    class="block my-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Create Data Produk
</button>

@include('alerts.success')

<!-- Include Create Modal -->
@include('pages.produk.create-modal')

<div class="grid grid-cols-1 gap-4 mb-4">
    <div class="flex items-center justify-evenly p-10 rounded-lg shadow-sm shadow-gray-500 bg-white dark:bg-gray-800">
        <table id="produk-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Produk</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Harga</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button data-modal-target="popup-edit-{{ $product->id }}"
                                        data-modal-toggle="popup-edit-{{ $product->id }}"
                                        class="text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-4 py-2">
                                    Edit
                                </button>
                                <button data-modal-target="popup-delete-{{ $product->id }}"
                                        data-modal-toggle="popup-delete-{{ $product->id }}"
                                        class="text-white bg-red-600 hover:bg-red-700 rounded-lg text-sm px-4 py-2">
                                    Delete
                                </button>
                            </div>
                            @include('pages.produk.edit-modal', ['product' => $product])
                            @include('pages.produk.delete-modal', ['product' => $product])
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
    if (document.getElementById("produk-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#produk-table", {
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 15, 20],
            searchable: true,
            sortable: true
        });
    }
</script>
@endsection
