<?php
namespace App\Services\Filters;

class MercyAccountApplicationFilters extends AbstractFilters
{
    public function getResultIndexMercyAccountApplication($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
