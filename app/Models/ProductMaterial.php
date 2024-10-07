<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    use HasFactory;

    // Jika menggunakan nama tabel yang tidak sesuai dengan konvensi Laravel, tambahkan ini
    protected $table = 'product_material';

    // Jika menggunakan timestamps, pastikan kolom 'created_at' dan 'updated_at' ada
    public $timestamps = true;

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'material_id',
        'product_id',
        'jumlah',
    ];

    // Relasi ke model Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
