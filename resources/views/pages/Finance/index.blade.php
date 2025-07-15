@extends('welcome')
@section('content')
<button data-modal-target="popup-create" data-modal-toggle="popup-create"
    class="block my-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Create Data Produk
</button>
@include('pages.report-pumping.create-modal')
<div class="grid grid-cols-1 gap-4 mb-4">
        <div class="flex items-center justify-evenly p-10 rounded-lg shadow-sm shadow-gray-500 bg-white dark:bg-gray-800">
            <table id="pagination-table">
                <thead class="bg-gray-100 dark:bg-gray-700 text-xs font-semibold uppercase text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Produk</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}
                            </td>
                            <td>{{ $data->nama }}</td>
                            <td> {{ round(\Carbon\Carbon::parse($data->child->tanggal_lahir)->diffInMonths(\Carbon\Carbon::now())) }}
                                bulan</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="px-5 py-2 bg-green-500 rounded-lg text-white view-button"
                                    data-id="{{ $data->id }}"
                                    data-nama="{{ $data->nama }}"
                                    data-kategori="{{ $data->child->tanggal_lahir }}"
                                    data-harga="{{ $data->nama }}">
                                    View
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex items-center justify-center mb-4 rounded bg-blue-700">
    </div>

    <!-- Modal -->
    <div id="modalDetail"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">Detail Produk</h2>
            <p><strong>Nama Produk:</strong> <span id="modalNama"></span></p>
            <p><strong>Kategori:</strong> <span id="modalKategori"></span></p>
            <p><strong>Harga:</strong> <span id="modalHarga"></span></p>

            <div class="flex justify-end mt-4">
                <button id="closeModal" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalDetail');
        const closeBtn = document.getElementById('closeModal');

        // Buka modal
        document.querySelectorAll('.view-button').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modalNama').textContent = this.dataset.nama;
                document.getElementById('modalKategori').textContent = this.dataset.kategori;
                document.getElementById('modalHarga').textContent = this.dataset.nama;
                modal.classList.remove('hidden');
            });
        });

        // Tutup modal
        closeBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    });

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
