<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Pastikan foreign key (category_id, supplier_id) masuk sini!
    protected $fillable = [
        'category_id', 
        'supplier_id', 
        'name', 
        'stock', 
        'price'
    ];

    /**
     * Relasi Balik ke Category (Inverse One to Many)
     * Setiap produk pasti punya satu kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi Balik ke Supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
