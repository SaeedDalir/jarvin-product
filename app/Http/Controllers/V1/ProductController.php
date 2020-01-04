<?php namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Product\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return response([
            'data' => $this->productRepository->all(),
            'status' => 'success',
        ],200);
    }
}
