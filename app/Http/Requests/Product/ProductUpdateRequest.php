<?php namespace App\Http\Requests\Product;

use App\Http\Requests\BaseFormRequestAbstract;

class ProductUpdateRequest extends BaseFormRequestAbstract
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'persian_name' => 'required|string',
            'english_name' => 'required|string',
            'store_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'nullable|numeric',
            'description' => 'nullable|string',
            'in_stock' => 'nullable|numeric',
            'warranty_name' => 'nullable|string',
            'warranty_text' => 'nullable|string',
            'current_price' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
