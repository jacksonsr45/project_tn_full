<?php
namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractFilters
{
	/**
	 * @var Model
	 */
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function selectConditions($condition)
	{
		$expressions = explode(';', $condition);
		foreach($expressions as $e) {
			$exp = explode('', $e);

			$this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
		}
	}

	public function selectFilter($filters)
	{
		$this->model = $this->model->selectRaw($filters);
	}

	public function getResult()
	{
		return $this->model;
	}
}