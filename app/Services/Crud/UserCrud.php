<?php
namespace App\Services\Crud;
use Illuminate\Support\Facades\Validator;

class UserCrud extends AbstractCrud
{
    public function create($request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        $user = $this->model->create($data);

        $user->profile()->create(
            /**
             * Gerando os dados para user em profile!
            */
            [
                'user_id'           => $data['user_id'],
                'phone'             => $data['phone'],
                'mobile_phone'      => $data['mobile_phone'],
                'description'       => $data['description'],
                'function'          => $data['function']
            ]
        );

        $user->address()->create(
            /**
             * Gerando os dados para user em address!
            */
            [
                'user_id'           => $data['user_id'],
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'country_id'        => $data['country_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        $this->model = $this->model->findOrFail($id);
        $this->model->update($data);

        $this->model->profile()->update(
            /**
             * Gerando update de dados para user em profile!
            */
            [
                'user_id'           => $data['user_id'],
                'phone'             => $data['phone'],
                'mobile_phone'      => $data['mobile_phone'],
                'description'       => $data['description'],
                'function'          => $data['function']
            ]
        );

        $this->model->address()->update(
            /**
             * Gerando update de dados para user em address!
            */
            [
                'user_id'           => $data['user_id'],
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'country_id'        => $data['country_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );
        return $this->model;
    }
}
