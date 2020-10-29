<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MercyAccountApplication;
Use App\Services\Crud\MercyAccountApplicationCrud;
use App\Services\Messages\Error\MercyAccountApplicationMessageError;
use App\Services\Messages\Success\MercyAccountApplicationMessageSuccess;

class MercyAccountApplicationController extends Controller
{
    protected $models;
	public function __construct(MercyAccountApplication $models)
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
        $data = new MercyAccountApplicationCrud($this->models);
        $message = new MercyAccountApplicationMessageSuccess('index',
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
            $data = new MercyAccountApplicationCrud($this->models);
            $message = new MercyAccountApplicationMessageSuccess('store',
                                $data->create($request));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new MercyAccountApplicationMessageError($e->getMessage());
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
            $data = new MercyAccountApplicationCrud($this->models);
            $message = new MercyAccountApplicationMessageSuccess('show',
                                    $data->show($id));
            return response()->json($message
                                ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new MercyAccountApplicationMessageError($e->getMessage());
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
            $data = new MercyAccountApplicationCrud($this->models);
            $message = new MercyAccountApplicationMessageSuccess('update',
                                    $data->update($request, $id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new MercyAccountApplicationMessageError($e->getMessage());
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
            $data = new MercyAccountApplicationCrud($this->models);
            $message = new MercyAccountApplicationMessageSuccess('destroy',
                                    $data->delete($id));
            return response()->json($message
                            ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new MercyAccountApplicationMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
