<?php namespace App\Http\Controllers\V1;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Requests\Product\ProductUpdateStatusRequest;
use App\Repositories\Eloquent\Product\ProductRepository;
use App\Services\Helpers\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    private $productRepository;
    private $apiResponse;

    public function __construct(ProductRepository $productRepository,ApiResponse $apiResponse)
    {
        $this->productRepository = $productRepository;
        $this->apiResponse = $apiResponse;
    }

    public function index()
    {
        return $this->apiResponse->customResponse($this->productRepository->paginate(15),'success',200);
    }

    public function store(ProductCreateRequest $request)
    {
        $product = $this->productRepository->create($request->validated());
        if (empty($product)) {
            throw new BadRequestException();
        }
        return $this->apiResponse->customResponse($product,'created successfully', 200);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        if (! $this->productRepository->update($request->validated(),$id))
            throw new BadRequestException();
        return $this->apiResponse->customResponse([],'updated successfully', 200);
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            throw new ModelNotFoundException();
        }
        return $this->apiResponse->customResponse($product,'updated successfully', 200);
    }

    public function destroy($id)
    {
        if (! $this->productRepository->delete($id)) {
            throw new BadRequestException();
        }
        return $this->apiResponse->customResponse([],'deleted successfully', 200);
    }

    public function status(ProductUpdateStatusRequest $request, $id)
    {
        if (! $this->productRepository->update(['confirmation_status' => $request->status], $id)) {
            throw new BadRequestException();
        }
        return $this->apiResponse->customResponse([],'changed successfully', 200);
    }
}
