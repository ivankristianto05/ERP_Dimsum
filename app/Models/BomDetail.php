<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BomDetail extends Model
{
    protected $fillable = ['bom_id', 'material_id', 'qty', 'satuan', 'cost'];

    public function bom()
    {
        return $this->belongsTo(Bom::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
