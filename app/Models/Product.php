<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'kategori', 'codeprodak', 'harga', 'deskripsi', 'foto'
    ];

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'product_material', 'product_id', 'material_id')
                    ->withPivot('jumlah')->select('product_material.jumlah', 'materials.nama','satuan');;
    }
}
