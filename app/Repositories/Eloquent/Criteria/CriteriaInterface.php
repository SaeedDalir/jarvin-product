<?php namespace App\Repositories\Eloquent\Criteria;

interface CriteriaInterface
{
    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param CriteriaAbstract $criteria
     * @return $this
     */
    public function getByCriteria(CriteriaAbstract $criteria);

    /**
     * @param CriteriaAbstract $criteria
     * @return $this
     */
    public function pushCriteria(CriteriaAbstract $criteria);

    /**
     * @return $this
     */
    public function  applyCriteria();
}
