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

	public function getResult()
	{
		return $this->model;
	}
}
