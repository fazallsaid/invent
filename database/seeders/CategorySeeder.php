<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pake firstOrCreate biar gak duplikat kalau di-seed ulang
        Category::firstOrCreate([
            'code' => 'ELK-001'
        ], [
            'name' => 'Elektronik',
            'description' => 'Gadget dan perangkat listrik.'
        ]);

        Category::firstOrCreate([
            'code' => 'FRN-001'
        ], [
            'name' => 'Furniture',
            'description' => 'Meja, kursi, dan lemari.'
        ]);

        Category::firstOrCreate([
            'code' => 'ATK-001'
        ], [
            'name' => 'Alat Tulis',
            'description' => 'Kebutuhan administrasi kantor.'
        ]);
    }
}
