<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PietyAccountMovements;
Use App\Services\Crud\PietyAccountMovementsCrud;
use App\Services\Messages\Error\PietyAccountMovementsMessageError;
use App\Services\Messages\Success\PietyAccountMovementsMessageSuccess;

class PietyAccountMovementsController extends Controller
{
    protected $models;
	public function __construct(PietyAccountMovements $models)
    {
        $this->models = $models;
    }
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new PietyAccountMovementsCrud($this->models);
        $message = new PietyAccountMovementsMessageSuccess('index',
                                $data->read($request));
        return response()->json($message
                        ->getMessage(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new PietyAccountMovementsCrud($this->models);
            $message = new PietyAccountMovementsMessageSuccess('store',
                                $data->create($request));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyAccountMovementsMessageError($e->getMessage());
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
            $data = new PietyAccountMovementsCrud($this->models);
            $message = new PietyAccountMovementsMessageSuccess('show',
                                    $data->show($id));
            return response()->json($message
                                ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyAccountMovementsMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = new PietyAccountMovementsCrud($this->models);
            $message = new PietyAccountMovementsMessageSuccess('update',
                                    $data->update($request, $id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyAccountMovementsMessageError($e->getMessage());
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
            $data = new PietyAccountMovementsCrud($this->models);
            $message = new PietyAccountMovementsMessageSuccess('destroy',
                                    $data->delete($id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyAccountMovementsMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
