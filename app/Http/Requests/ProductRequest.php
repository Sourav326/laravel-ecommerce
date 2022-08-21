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
            'price_per_unit' => 'required|integer',
            'sale_price_per_unit' => 'nullable|integer',
            'status' => '',
            'stock_quantity' => 'required|integer',
            'stock_quantity_to_order' => 'nullable|integer',
            'tax_percentage' => 'nullable|integer',
            'estimated_shipping_days' => 'nullable|integer',
            'delivery_charges' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => '',
            'description' => 'required',
            'product_main_image' => 'required|image|mimes:png,jpg,jpeg'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'product_unique_code.required' => 'Product Unique Code is required',
            'product_unique_code.unique' => 'This Unique Code already taken',
            'price_per_unit.required' => 'Price is required',
            'price_per_unit.integer' => 'Price must be an integer.',
            'sale_price_per_unit.integer' => 'Sale Price must be an integer.',
            'stock_quantity.required' => 'Quantity is required',
            'stock_quantity.integer' => 'Quantity must be an integer',
            'stock_quantity_to_order.integer' => 'Quantity must be an integer',
            'tax_percentage.integer' => 'Tax must be an integer',
            'estimated_shipping_days.integer' => 'It must be an integer',
            'delivery_charges.integer' => 'Charges must be an integer',
            'weight.integer' => 'Weight must be an integer',
            'description.required' => 'Description is required',
            'product_main_image.required' => 'Image is required',
            'product_main_image.image' => 'It must be an image of type png, jpg, jpeg',
        ];
    }
}
