<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entity;

class EntityController extends Controller
{
    /**
	 * @var entity
	 */
	private $entity;

	public function __construct(Entity $entity)
    {
	    $this->entity = $entity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities = $this->entity->all();

        return response()->json([
            'data' => $entities
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        try {
            $entity = $this->entity->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'msg' => 'Entidade cadastrada com sucesso!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $entity = $this->entity->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Entidade não encontrada!'
            ], 404);
        }

        return response()->json([
            'data' => $entity
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $entity = $this->entity->findOrFail($id);
            $entity->update($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Entidade não atualizada!'
            ], 406);
        }
        return response()->json([
            'data' => $entity
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $entity = $this->entity->findOrFail($id);
            $entity->delete($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Entidade não removida!'
            ], 401);
        }
        return response()->json([
            'data' => [
                'msg' => 'Entidade removida com sucesso!'
            ]
        ], 200);
    }
}
