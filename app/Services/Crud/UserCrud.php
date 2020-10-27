<?php
namespace App\Services\Crud;

use App\Services\Filters\UsersFilters;

class UserCrud extends AbstractCrud
{
    public function read($request)
    {
        /**
         * Deixando por enquanto sem funcionamento e aqui
         * porem levar para outro field e remover o request deste index
        */
        $filter = new UsersFilters($this->model);
        if($request)
        {
            if($request->has('conditions'))
            {
                $filter->selectConditions($request->get('conditions'));
            }
            if($request->has('fields'))
            {
                $filter->selectFilter($request->get('fields'));
            }

            return $filter->getResult()->paginate(10);
        }
        /**
         * Retorna usuário com Profile e Address
        */
        return $this->model->with('profile')
                           ->with('user_address')
                           ->paginate(10);
    }

    public function create($request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        $data['entity_id'] = $request->entity_id;
        $data['password'] = bcrypt($data['password']);
        $user = $this->model->create($data);
        $profile = $user->profile()->create(
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
        $address = $user->user_address()->create(
            /**
             * Gerando os dados para user em address!
            */
            [
                'user_id'           => $profile['user_id'],
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );
        return $this->model->with('profile')
                            ->with('user_address')
                            ->findOrFail($address['user_id']);
    }

    public function show($id)
    {
        /**
         * Retorna usuário filtrado pelo ID com Profile e Address
        */
        return $this->model->with('profile')
                            ->with('user_address')
                            ->findOrFail($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $data['entity_id'] = $request->entity_id;
        $data['entity_id'] = $request->entity_id;
        /**
         * Pequena validação se a um password ou se foi fornecido algum!
        */
        if($request->has('password') && $request->get('password'))
        {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $this->model = $this->model->findOrFail($id);
        $this->model->update($data);
        $this->model->profile()->update(
            /**
             * Gerando update de dados para user em profile!
            */
            [
                'user_id'           => $this->model->id,
                'entity_id'         => $data['entity_id'],
                'phone'             => $data['phone'],
                'mobile_phone'      => $data['mobile_phone'],
                'description'       => $data['description'],
                'function'          => $data['function']
            ]
        );
        $this->model->user_address()->update(
            /**
             * Gerando update de dados para user em address!
            */
            [
                'user_id'           => $this->model->id,
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );
        return $this->model->with('profile')
                           ->with('user_address')
                           ->findOrFail($id);
    }
}
