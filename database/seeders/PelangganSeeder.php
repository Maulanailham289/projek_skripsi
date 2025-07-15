<?php

namespace Database\Seeders;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggan = [
            ['name' => 'PT Nusantara Rempah', 'contact' => '08123456789', 'country' => 'Indonesia'],
            ['name' => 'Global Spice Ltd', 'contact' => '+62234567890', 'country' => 'India'],
            ['name' => 'Vanilla Export Inc', 'contact' => '+134567890', 'country' => 'USA'],
        ];

        foreach ($pelanggan as $item) {
            Customer::create($item);
        }
    }
}
