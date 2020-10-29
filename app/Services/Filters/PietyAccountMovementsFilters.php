<?php
namespace App\Services\Filters;

class PietyAccountMovementsFilters extends AbstractFilters
{
    public function getResultIndexPietyAccountMovements($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
