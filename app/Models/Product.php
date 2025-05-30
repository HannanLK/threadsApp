<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'category',
        'price',
        'stock',
        'sizes',
        'colors',
        'description',
        'images',
        'is_featured',
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
        'images' => 'array',
        'price' => 'double', 
        'stock' => 'integer',
        'is_featured' => 'boolean',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}