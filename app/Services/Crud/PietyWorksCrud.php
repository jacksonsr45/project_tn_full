<?php
namespace App\Services\Crud;

use App\Services\Filters\PietyWorksFilters;

class PietyWorksCrud extends AbstractCrud
{
    public function read($request)
    {
        /**
        * Instanciando PietyWorksFilter no $filter
        * passando $request
        * Pegando resultado para todos $this->entity_id neste model
        */
        $filter = new PietyWorksFilters($this->model);
        $filter->getResultIndexPietyWorks($request);
        return $filter->getResult()->paginate(10);
    }

    public function create($request)
    {
        $data = $request->all();
        $data['entity_id'] = $request->entity_id;
        $data['user_id'] = $request->user_id;
        $data['account_id'] = $request->account_id;
        $value = $this->model->create($data);
        return $this->model->findOrFail($value->id);
    }

    public function show($id)
    {
        return $this->model->paginate(10);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $this->model = $this->model->findOrFail($id);
        $this->model->update($data);
        return $this->model->findOrFail($this->model->id);
    }
}
