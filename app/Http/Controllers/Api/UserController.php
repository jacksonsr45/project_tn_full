<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use App\Services\ApiErrMessages;
Use App\Services\ApiSuccessMessages;

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
        $users = $this->user->all();

        $msg = 'Listando todos Usuários!';
        $message = new ApiSuccessMessages($msg, $users);
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
        try {
            $data['password'] = bcrypt($data['password']);
            $user = $this->user->create($data);

            $msg = 'Usuário cadastrado com sucesso!';
            $message = new ApiSuccessMessages($msg, $user);
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
            $user = $this->user->findOrFail($id);

            $msg = 'Listando Usuário!';
            $message = new ApiSuccessMessages($msg, $user);
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
            $user = $this->user->findOrFail($id);
            $user->update($data);

            $msg = 'Usuário atualizado com sucesso!';
            $message = new ApiSuccessMessages($msg, $user);
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
            $user = $this->user->findOrFail($id);
            $user->delete($id);

            $msg = 'Usuário removido com sucesso!';
            $message = new ApiSuccessMessages($msg, $user);
            return response()->json($message
                        ->getMessage(), 200);
        } catch (\Exception $e) {
            $message = new ApiErrMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
