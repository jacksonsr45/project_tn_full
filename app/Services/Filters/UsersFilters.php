<?php
namespace App\Services\Filters;

class UsersFilters extends AbstractFilters
{
    public function getResultIndexUsers($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
