<?php namespace App\Repositories\Eloquent\Criteria\Products;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Eloquent\Criteria\CriteriaAbstract;

class TestCriteria extends CriteriaAbstract
{
    /**
     * @inheritDoc
     */
    public function apply($model, BaseRepositoryInterface $repository)
    {
        return $model->where('name', '=', 'Hossein');
    }
}
