<?php
namespace App\Services\Crud;

use App\Services\Filters\MercyAccountApplicationFilters;

class MercyAccountApplicationCrud extends AbstractCrud
{
    public function read($request)
    {
        /**
        * Instanciando MercyAccountApplicationFilters no $filter
        * passando $request
        * Pegando resultado para todos $this->entity_id neste model
        */
        $filter = new MercyAccountApplicationFilters($this->model);
        $filter->getResultIndexMercyAccountApplication($request);
        return $filter->getResult()->paginate(10);
    }

    public function create($request)
    {
        $data = $request->all();
        $data['entity_id'] = $request->entity_id;
        $data['user_id'] = $request->user_id;
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
