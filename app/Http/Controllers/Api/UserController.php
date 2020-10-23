<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        $user = $this->user->paginate('10');

        return response()->json([
            'data' => $user
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
        try {
            $data['password'] = bcrypt($data['password']);
            $user = $this->user->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não cadastrado!'
            ], 400);
        }

        return response()->json([
            'msg' => 'Usuário cadastrado com sucesso!'
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
            $user = $this->user->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não encontrado!'
            ], 404);
        }

        return response()->json([
            'data' => $user
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
            $user = $this->user->findOrFail($id);
            $user->update($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não atualizado!'
            ], 406);
        }
        return response()->json([
            'data' => $user
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
            $user = $this->user->findOrFail($id);
            $user->delete($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não removido!'
            ], 401);
        }
        return response()->json([
            'data' => [
                'msg' => 'Usuário removido com sucesso!'
            ]
        ], 200);
    }
}
