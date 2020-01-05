<?php namespace App\Services\Helpers;

use App\Http\Controllers\BaseController;
use App\Repositories\Eloquent\Product\ProductRepository;

class SKUHandler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function generateSKU(): ?string
    {
        try {
            $number = random_int(10000, 9000000);
            if (!empty($this->checkSKU($number))){
                $this->generateSKU();
            }
            return (string)$number;
        } catch (\Exception $e) {
            dd($e);
            (new BaseController())->customResponse([],$e->getMessage(),$e->getCode());
        }
    }

    private function checkSKU($number)
    {
        return $this->productRepository->findBy('sku', $number);
    }
}
