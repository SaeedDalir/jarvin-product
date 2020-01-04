<?php namespace App\Repositories\Eloquent\Product;

use App\Repositories\Eloquent\BaseRepositoryAbstract;
use App\Repositories\Eloquent\Criteria\CriteriaAbstract;

class ProductRepository extends BaseRepositoryAbstract implements ProductRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function skipCriteria($status = true)
    {
        // TODO: Implement skipCriteria() method.
    }

    /**
     * @inheritDoc
     */
    public function getCriteria()
    {
        // TODO: Implement getCriteria() method.
    }

    /**
     * @inheritDoc
     */
    public function getByCriteria(CriteriaAbstract $criteria)
    {
        // TODO: Implement getByCriteria() method.
    }

    /**
     * @inheritDoc
     */
    public function pushCriteria(CriteriaAbstract $criteria)
    {
        // TODO: Implement pushCriteria() method.
    }

    /**
     * @inheritDoc
     */
    public function applyCriteria()
    {
        // TODO: Implement applyCriteria() method.
    }
}
