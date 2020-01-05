<?php namespace App\Observers;

use App\Models\Product;
use App\Services\Helpers\SKUHandler;

class ProductObserver
{
    private $SKUHandler;

    public function __construct(SKUHandler $SKUHandler)
    {
        $this->SKUHandler = $SKUHandler;
    }

    public function creating(Product $product)
    {
        $product->sku = $this->SKUHandler->generateSKU();
    }
}
