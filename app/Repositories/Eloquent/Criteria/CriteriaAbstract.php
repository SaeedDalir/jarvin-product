<?php namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\BaseRepositoryInterface;

abstract class CriteriaAbstract
{
    /**
     *
     * @param $model
     * @param BaseRepositoryInterface $repository
     * @return mixed
     */
    abstract public function apply($model, BaseRepositoryInterface $repository);
}
