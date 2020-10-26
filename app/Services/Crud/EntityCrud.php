<?php
namespace App\Services\Crud;

class EntityCrud extends AbstractCrud
{
    public function read()
    {
        return $this->model->with('entity_address')
                            ->with('user')
                            ->paginate(10);
    }

    public function create($request)
    {
        $data = $request->all();
        $data['entity_id'] = $request->entity_id;
        $entity = $this->model->create($data);

        $address = $entity->entity_address()->create(
            /**
             * Gerando os dados para entity em address!
            */
            [
                'entity_id'         => $data['entity_id'],
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );


        return $this->model->with('entity_address')
                            ->findOrFail($address['entity_id']);
    }

    public function show($id)
    {
        return $this->model->with('entity_address')
                                ->findOrFail($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $this->model = $this->model->findOrFail($id);
        $this->model->update($data);

        $this->model->entity_address()->update(
            /**
             * Gerando update de dados para user em address!
            */
            [
                'entity_id'         => $this->model->id,
                'state_id'          => $data['state_id'],
                'city_id'           => $data['city_id'],
                'address'           => $data['address'],
                'number'            => $data['number'],
                'neighborhood'      => $data['neighborhood'],
                'complement'        => $data['complement'],
                'zip_code'          => $data['zip_code']
            ]
        );

        return $this->model->with('entity_address')
                                ->findOrFail($this->model->id);
    }
}
