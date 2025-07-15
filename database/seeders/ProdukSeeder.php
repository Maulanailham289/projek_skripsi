<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            ['name' => 'Vanili', 'category' => 'Rempah', 'price' => 200000],
            ['name' => 'Cengkeh', 'category' => 'Rempah', 'price' => 150000],
            ['name' => 'Cabe Jawa', 'category' => 'Rempah', 'price' => 100000],
        ];

        foreach ($produk as $item) {
            Product::create($item);
        }
    }
}
