<?php
namespace App\Services\Crud;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractCrud
{
	/**
	 * @var Model
	 */
	protected $model;
    protected $request;
    protected $id;

    public function __construct(Model $model)
	{
		$this->model = $model;
    }

    public function read($request)
    {
        return $this->model->all();
    }

    public function create($request)
    {
        $data = $request->all();
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $this->model = $this->model->findOrFail($id);
        $this->model->update($data);
        return $this->model;
    }

    public function delete($id)
    {
        $this->model = $this->model->findOrFail($id);
        return $this->model->delete($id);
    }
}
