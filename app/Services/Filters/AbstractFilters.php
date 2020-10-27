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

    public function getResultIndexUsers($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }

	public function getResult()
	{
		return $this->model;
	}
}
