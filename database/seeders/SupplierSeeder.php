<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::firstOrCreate([
            'name' => 'PT. Sumber Makmur Jaya'
        ], [
            'phone' => '081234567890',
            'address' => 'Jl. Magelang KM 5, Yogyakarta'
        ]);

        Supplier::firstOrCreate([
            'name' => 'CV. Abadi Sentosa'
        ], [
            'phone' => '089876543210',
            'address' => 'Jl. Kaliurang KM 10, Sleman'
        ]);
    }
}
