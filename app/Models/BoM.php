<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoM extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode', 'qty', 'cost'];

    // Relasi dengan Material
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
