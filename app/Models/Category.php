<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = ['name', 'code', 'description'];

    /**
     * Relasi ke Product (One to Many)
     * Satu kategori bisa punya banyak produk
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
