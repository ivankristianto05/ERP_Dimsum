<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = []; // Add other fields as necessary

    // Define the relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('jumlah') // Include the pivot field
                    ->withTimestamps();
    }
    
    public function productMaterials()
    {
        return $this->hasMany(ProductMaterial::class, 'material_id');
    }
}
