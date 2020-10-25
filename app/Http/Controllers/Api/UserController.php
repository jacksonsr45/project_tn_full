<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
Use App\Services\Crud\UserCrud;
use App\Services\Messages\Error\UserMessageError;
use App\Services\Messages\Success\UserMessageSuccess;

class UserController extends Controller
{
    /**
	 * @var user
	 */
	private $user;

	public function __construct(User $user)
    {
	    $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new UserCrud($this->user);
        $message = new UserMessageSuccess('index',
                                    $data->read());
        return response()->json($message
                        ->getMessage(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data = new UserCrud($this->user);
            $message = new UserMessageSuccess('store',
                                    $data->create($request));
            return response()->json($message
                        ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage(), []);
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
            $data = new UserCrud($this->user);
            $message = new UserMessageSuccess('show',
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
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $data = new UserCrud($this->user);
            $message = new UserMessageSuccess('update',
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
            $data = new UserCrud($this->user);
            $message = new UserMessageSuccess('destroy',
                                    $data->delete($id));
            return response()->json($message
                        ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new UserMessageError($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
