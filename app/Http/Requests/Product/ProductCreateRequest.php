<?php namespace App\Http\Requests\Product;

use App\Http\Requests\BaseFormRequestAbstract;

class ProductCreateRequest extends BaseFormRequestAbstract
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function filters()
    {
        return [
            'persian_name'      =>  'cast:string|trim|escape|capitalize',
            'english_name'      =>  'cast:string|trim|escape|capitalize',
            'store_id'          =>  'cast:integer',
            'user_id'           =>  'cast:integer',
            'category_id'       =>  'cast:integer',
            'brand_id'          =>  'cast:integer',
            'description'       =>  'cast:string|strip_tags',
            'in_stock'          =>  'cast:integer',
            'warranty_name'     =>  'cast:string|trim|escape|capitalize',
            'warranty_text'     =>  'cast:string|strip_tags',
            'current_price'     =>  'cast:integer',
        ];
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
//'english_name' => ['required','regex:/^[A-Za-z0-9]+((\s|\s?-\s?)[A-Za-z0-9]+)*$/'],
    /**
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
