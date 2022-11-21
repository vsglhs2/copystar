<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'cost' => 'required|numeric',
            'model' => 'required|string',
            'production_country' => 'required|string',
            'production_year' => 'required|integer',
            'category_id' => 'required|integer',
            'amount' => 'required|integer'
        ];
    }
}
