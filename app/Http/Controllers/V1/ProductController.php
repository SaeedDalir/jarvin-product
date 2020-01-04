<?php namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Repositories\Eloquent\Product\ProductRepository;

class ProductController extends BaseController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->customResponse($this->productRepository->paginate(15),'success',200);
    }

}
