<?php

namespace Database\Seeders;
use App\Models\Export;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EksporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggan = Customer::all();
        $produk = Product::all();

        Export::create([
            'export_date' => '2025-07-01',
            'customer_id' => $pelanggan[0]->id,
            'product_id' => $produk[0]->id,
            'country' => 'Jepang',
            'volume' => 1000,
            'price' => 100000000,
            'net_profit' => 40000000,
        ]);

        Export::create([
            'export_date' => '2025-07-03',
            'customer_id' => $pelanggan[1]->id,
            'product_id' => $produk[1]->id,
            'country' => 'India',
            'volume' => 500,
            'price' => 75000000,
            'net_profit' => 30000000,
        ]);
    }
}
