<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'product_unique_code' => 'required|unique:products',
            'price_per_unit' => 'required',
            'sale_price_per_unit' => '',
            'status' => '',
            'stock_quantity' => 'required',
            'stock_quantity_to_order' => '',
            'tax_percentage' => '',
            'estimated_shipping_days' => '',
            'delivery_charges' => '',
            'weight' => '',
            'color' => '',
            'description' => 'required',
            'product_main_image' => 'required'
        ];
    }
}
