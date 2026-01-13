<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori & supplier yang udah dibuat sebelumnya
        // Pake 'code' atau 'name' buat nyarinya
        $catElk = Category::where('code', 'ELK-001')->first();
        $catFrn = Category::where('code', 'FRN-001')->first();
        $catAtk = Category::where('code', 'ATK-001')->first();

        $supJaya  = Supplier::where('name', 'PT. Sumber Makmur Jaya')->first();
        $supAbadi = Supplier::where('name', 'CV. Abadi Sentosa')->first();

        // Pastikan datanya ada, baru bikin produk (biar gak error)
        if ($catElk && $supJaya) {
            Product::create([
                'category_id' => $catElk->id,
                'supplier_id' => $supJaya->id,
                'name' => 'Laptop Gaming ROG',
                'stock' => 5,
                'price' => 15000000
            ]);

            Product::create([
                'category_id' => $catElk->id,
                'supplier_id' => $supJaya->id,
                'name' => 'Mouse Wireless Logitech',
                'stock' => 25,
                'price' => 150000
            ]);
        }

        if ($catFrn && $supAbadi) {
            Product::create([
                'category_id' => $catFrn->id,
                'supplier_id' => $supAbadi->id,
                'name' => 'Kursi Gaming Ergonomis',
                'stock' => 10,
                'price' => 2500000
            ]);
        }

        if ($catAtk && $supAbadi) {
            Product::create([
                'category_id' => $catAtk->id,
                'supplier_id' => $supAbadi->id,
                'name' => 'Kertas A4 Sidu (1 Rim)',
                'stock' => 100,
                'price' => 45000
            ]);
        }
    }
}
