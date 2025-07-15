<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Baby;
use App\Models\Child;
use App\Models\Mother;
use App\Models\Pumping;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        $this->call([
            ProdukSeeder::class,
            PelangganSeeder::class,
            EksporSeeder::class,
            KeuanganSeeder::class,
        ]);
    }
}
