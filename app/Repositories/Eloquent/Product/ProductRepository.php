<?php namespace App\Repositories\Eloquent\Product;

use App\Models\Product;
use App\Repositories\Eloquent\BaseRepositoryAbstract;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepositoryAbstract implements ProductRepositoryInterface
{
    /* This class only implements the custom functions to be expected of THIS repository */

    protected $model;
    protected $criteria;

    public function __construct(Product $product, Collection $collection)
    {
        $this->model = $product;
        $this->criteria = $collection;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        // TODO: Implement model() method.
    }

}
