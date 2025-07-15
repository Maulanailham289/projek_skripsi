@extends('welcome')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Nama Produk</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block">Harga</label>
            <input type="number" name="price" id="price" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block">Stok</label>
            <input type="number" name="stock" id="stock" class="w-full border rounded p-2" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('produk.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
