<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PietyWork;
Use App\Services\Crud\PietyWorksCrud;
use App\Services\Messages\Error\PietyWorksMessageError;
use App\Services\Messages\Success\PietyWorksMessageSuccess;


class PietyWorksController extends Controller
{
    protected $models;
	public function __construct(PietyWork $models)
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
        $data = new PietyWorksCrud($this->models);
        $message = new PietyWorksMessageSuccess('index',
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
            $data = new PietyWorksCrud($this->models);
            $message = new PietyWorksMessageSuccess('store',
                                $data->create($request));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyWorksMessageError($e->getMessage());
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
            $data = new PietyWorksCrud($this->models);
            $message = new PietyWorksMessageSuccess('show',
                                    $data->show($id));
            return response()->json($message
                                ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyWorksMessageError($e->getMessage());
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
            $data = new PietyWorksCrud($this->models);
            $message = new PietyWorksMessageSuccess('update',
                                    $data->update($request, $id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyWorksMessageError($e->getMessage());
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
            $data = new PietyWorksCrud($this->models);
            $message = new PietyWorksMessageSuccess('destroy',
                                    $data->delete($id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new PietyWorksMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
