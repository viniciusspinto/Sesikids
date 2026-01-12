<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class APIController extends Controller
{
        public function index(): JsonResponse
    {
        // Recuperar os usuários do banco de dados
        // $users = User::get();

        //Paginação
        $users = User::orderBy('id')->paginate(2);

        // Retornar os dados em formato de objeto e status 200
        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

        /** 
     * Recuperar os detalhes de um usuário específico.
     * 
     * @param \App\Models\User $user O id para recuperar os dados do usuário 
     * @return \Illuminate\Http\JsonResponse Retorna os dados do usuário em formato JSON
     */
    public function show(User $user): JsonResponse
    {
        // Retornar os dados em formato de objeto e status 200
        return response()->json([
            'status' => true,
            'users' => $user,
        ], 200);
    }

    public function store(UserRequest $request)
    {

        // Iniciar a transação
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retornar os dados em formato de objeto e status 201
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário cadastrado com sucesso!',
            ], 201);
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retornar os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Usuário não cadastrado!',
            ], 201);

        }
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {

        // Iniciar a transação
        DB::beginTransaction();

        try {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retornar os dados em formato de objeto e status 201
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário editado com sucesso!',
            ], 200);

        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retornar os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Usuário não editado!',
            ], 400);

        }
    }

    public function destroy(User $user): JsonResponse
    {
        try{

            // Excluir o registro do banco de dados
            $user->delete();

            // Retornar os dados em formato de objeto e status 200
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário apagado com sucesso!',
            ], 200);


        } catch (Exception $e){
            // Retornar os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Usuário não apagado!',
            ], 400);
        }
    }

    public function updatePassword(UserPasswordRequest $request, User $user): JsonResponse
    {

        // Iniciar a transação
        DB::beginTransaction();

        try {

            $user->update([
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retornar os dados em formato de objeto e status 200
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Senha editada com sucesso!',
            ], 200);

        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retornar os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Senha não editada!',
            ], 400);
        }
    }
}