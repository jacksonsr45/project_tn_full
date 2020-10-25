<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entity;
Use App\Services\Crud\EntityCrud;
use App\Services\Messages\Error\UserMessageError;
use App\Services\Messages\Success\EntityMessageSuccess;

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
        $data = new EntityCrud($this->entity);
        $message = new EntityMessageSuccess('index',
                                $data->read());
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
        try {
            $data = new EntityCrud($this->entity);
            $message = new EntityMessageSuccess('store',
                                $data->create($request));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage());
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
            $data = new EntityCrud($this->entity);
            $message = new EntityMessageSuccess('show',
                                    $data->show($id));
            return response()->json($message
                                ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage());
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
            $data = new EntityCrud($this->entity);
            $message = new EntityMessageSuccess('update',
                                    $data->update($request, $id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage());
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
            $data = new EntityCrud($this->entity);
            $message = new EntityMessageSuccess('destroy',
                                    $data->delete($id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
