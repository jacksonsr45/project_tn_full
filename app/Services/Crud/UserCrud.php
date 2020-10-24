<?php
namespace App\Services\Crud;

class UserCrud extends AbstractCrud
{
    public function create($request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        return $this->model->create($data);
    }
}
