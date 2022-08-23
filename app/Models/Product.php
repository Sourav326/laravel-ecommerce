<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'product_unique_code',
        'price_per_unit',
        'sale_price_per_unit',
        'status',
        'stock_quantity',
        'stock_quantity_to_order',
        'tax_percentage',
        'estimated_shipping_days',
        'description',
        'delivery_charges',
        'weight',
        'color',
        'product_main_image'
    ];

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
