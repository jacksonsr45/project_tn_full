<?php
namespace App\Services\Filters;

class PietyWorksFilters extends AbstractFilters
{
    public function getResultIndexPietyWorks($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
