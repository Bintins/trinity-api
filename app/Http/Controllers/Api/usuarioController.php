<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuario;
use Illuminate\Support\Facades\Validator;

class usuarioController extends controller
{
    public function index()
    {
        $usuario = Usuario::all();

        $data= [
            'usuario'=> $usuario,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|max:255',
            'contraseña' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion del usuario",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $usuario = Usuario::create([
            'usuario' =>$request->usuario,
            'contraseña'=>$request->contraseña
        ]);

        if (!$usuario) {
            $data = [
                "mensaje " => "Error al crear el usuario",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "usuario" => $usuario,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $usuario = Usuario::find($id);
            
        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'usuario' => $usuario,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);  

        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $usuario -> delete();

        $data = [
            'message' => 'Usuario ha sido eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'usuario' => 'required|max:255',
            'contraseña' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuario->usuario = $request->usuario;
        $usuario->contraseña = $request->contraseña;

        $usuario->save();

        $data = [
            'message' => 'El usuario seleccionado ha sido actualizado',
            'usuario' => $usuario,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data = [
                'message' => 'Usuario no ha sido encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'usuario' => 'max:255',
            'contraseña' => 'max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('usuario')) {
            $usuario->usuario = $request->usuario;
        }

        if ($request->has('contraseña')) {
            $usuario->contraseña = $request->contraseña;
        }

        $usuario->save();

        $data = [
            'message' => 'El usuario seleccionado ha sido actualizado',
            'usuario' => $usuario,
            'status' => 200
        ];

        return response()->json($data,200);
    }
    
}