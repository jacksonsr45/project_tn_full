<?php
namespace App\Services\Filters;

class EntitiesFilters extends AbstractFilters
{
    public function getResultIndexEntities($request)
    {
        $this->model = $this->model->where('id', 'LIKE',
                                    $request->entity_id );

    }
}
