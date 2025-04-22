<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\proveedores;
use Illuminate\Support\Facades\Validator;

class proveedoresController extends controller
{
    public function index()
    {
        $proveedores = Proveedores::all();

        $data= [
            'proveedores'=> $proveedores,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
        'producto' => 'required|max:255',
        'valor' => 'required|digits:6',
        'telefono'  => 'required|digits:10',
        'correo' => 'required|email'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de proveedores",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $proveedores = Proveedores::create([
        'producto' =>$request->producto,
        'valor' =>$request->valor,
        'telefono'  =>$request->telefono,
        'correo' =>$request->correo,
        ]);

        if (!$proveedores) {
            $data = [
                "mensaje " => "Error al crear los proveedores",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "proveedores" => $proveedores,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $proveedores = Proveedores::find($id);
            
        if (!$proveedores) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'proveedores' => $proveedores,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $proveedores = Proveedores::find($id);  

        if (!$proveedores) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $proveedores -> delete();

        $data = [
            'message' => 'Proveedor eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $proveedores = Proveedores::find($id);

        if (!$proveedores) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'producto' => 'required|max:255',
            'valor' => 'required|digits:6',
            'telefono'  => 'required|digits:10',
            'correo' => 'required|email'
            
            ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $proveedores->producto = $request->producto;
        $proveedores->valor = $request->valor;
        $proveedores->telefono = $request->telefono;
        $proveedores->correo = $request->correo;

        $proveedores->save();

        $data = [
            'message' => 'proveedor actualizado',
            'proveedores' => $proveedores,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $proveedores = Proveedores::find($id);

        if (!$proveedores) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'producto' => 'max:255',
            'valor' => 'digits:6',
            'telefono'  => 'digits:10',
            'correo' => 'email'
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('producto')) {
            $proveedores->producto = $request->producto;
        }

        if ($request->has('valor')) {
            $proveedores->valor = $request->valor;
        }
        
        if ($request->has('telefono')) {
            $proveedores->telefono = $request->telefono;
        }

        if ($request->has('correo')) {
            $proveedores->correo = $request->correo;
        }

        $proveedores->save();

        $data = [
            'message' => 'validator actualizada',
            'proveedores' => $proveedores,
            'status' => 200
        ];

        return response()->json($data,200);
    }

}