<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entity;
Use App\Services\ApiErrMessages;
Use App\Services\ApiSuccessMessages;

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

        $message = new ApiSuccessMessages('index', $entities);
        return response()->json($message
                        ->getMessage(), 200);
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

            $message = new ApiSuccessMessages('store', $entity);
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new ApiErrMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
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

            $message = new ApiSuccessMessages('show', $entity);
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new ApiErrMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
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

            $message = new ApiSuccessMessages('update', $entity);
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new ApiErrMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
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

            $message = new ApiSuccessMessages('destroy', $entity);
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new ApiErrMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
