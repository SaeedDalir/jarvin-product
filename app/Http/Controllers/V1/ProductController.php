<?php namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\ProductCreateRequest;
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

    public function store(ProductCreateRequest $request)
    {
        $data = [
            'persian_name' => $request->persian_name,
            'english_name' => $request->english_name,
            'store_id' => $request->store_id,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'in_stock' => $request->in_stock,
            'warranty_name' => $request->warranty_name,
            'warranty_text' => $request->warranty_text,
            'current_price' => $request->current_price,
        ];
        $product = $this->productRepository->create($data);
        if (empty($product))
            return $this->customResponse([],'bad request',400);
        return $this->customResponse($product,'created successfully', 200);
    }
}
