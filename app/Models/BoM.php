<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bom extends Model
{
    protected $fillable = ['bom_number', 'product_id'];

    public function details()
    {
        return $this->hasMany(BomDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
