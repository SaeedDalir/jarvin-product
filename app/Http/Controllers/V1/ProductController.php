<?php namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Requests\Product\ProductUpdateStatusRequest;
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
        $product = $this->productRepository->create($request->validated());
        if (empty($product)) {
            return $this->customResponse([], 'bad request', 400);
        }
        return $this->customResponse($product,'created successfully', 200);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        if (! $this->productRepository->update($request->validated(),$id))
            return $this->customResponse([],'bad request',400);
        return $this->customResponse([],'updated successfully', 200);
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product))
            return $this->customResponse([],'not found',404);
        return $this->customResponse($product,'updated successfully', 200);
    }

    public function destroy($id)
    {
        if (! $this->productRepository->delete($id))
            return $this->customResponse([],'not found',404);
        return $this->customResponse([],'deleted successfully', 200);
    }

    public function status(ProductUpdateStatusRequest $request, $id)
    {
        if (! $this->productRepository->update(['confirmation_status' => $request->status], $id))
            return $this->customResponse([],'not found',404);
        return $this->customResponse([],'changed successfully', 200);
    }
}
