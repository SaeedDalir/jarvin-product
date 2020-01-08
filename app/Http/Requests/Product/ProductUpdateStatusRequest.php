<?php namespace App\Http\Requests\Product;

use App\Http\Requests\BaseFormRequestAbstract;
use App\Utilities\Constants\ProductConfirmationStatus;

class ProductUpdateStatusRequest extends BaseFormRequestAbstract
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
            'status' => 'required|numeric|in:'.$this->getValidValues(),
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

    private function getValidValues()
    {
        return implode(',',ProductConfirmationStatus::allConfirmationStatus());
    }
}
