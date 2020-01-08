<?php namespace App\Observers;

use App\Models\Product;
use App\Services\Helpers\SkuHandler;

class ProductObserver
{
    private $SKUHandler;

    public function __construct(SkuHandler $SKUHandler)
    {
        $this->SKUHandler = $SKUHandler;
    }

    public function creating(Product $product)
    {
        $product->sku = $this->SKUHandler->generateSku();
    }
}
