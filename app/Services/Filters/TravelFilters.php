<?php
namespace App\Services\Filters;

class TravelFilters extends AbstractFilters
{
    public function getResultIndexTravel($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
