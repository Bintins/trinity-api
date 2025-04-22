<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\carrito;
use Illuminate\Support\Facades\Validator;

class carritoController extends controller
{
    public function index()
    {
        $carrito = Carrito::all();

        $data= [
            'carrito'=> $carrito,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipopago' => 'required|max:255',
            'costoenvio' => 'required|digits:6',
            'estado' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de estudiantes",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $carrito = Carrito::create([
            'tipopago' =>$request->tipopago,
            'costoenvio'=>$request->costoenvio,
            'estado'=>$request->estado
        ]);

        if (!$carrito) {
            $data = [
                "mensaje " => "Error al crear el carrito",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "carrito" => $carrito,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $carrito = Carrito::find($id);
            
        if (!$carrito) {
            $data = [
                'message' => 'Carrito no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'carrito' => $carrito,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $carrito = Carrito::find($id);  

        if (!$carrito) {
            $data = [
                'message' => 'Carrito no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $carrito -> delete();

        $data = [
            'message' => 'Carrito eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $carrito = Carrito::find($id);

        if (!$carrito) {
            $data = [
                'message' => 'Carrito no encontrado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'tipopago' => 'required|max:255',
            'costoenvio' => 'required|digits:6',
            'estado' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $carrito->tipopago = $request->tipopago;
        $carrito->costoenvio = $request->costoenvio;
        $carrito->estado = $request->estado;

        $carrito->save();

        $data = [
            'message' => 'Carrito actualizado',
            'carrito' => $carrito,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $carrito = Carrito::find($id);

        if (!$carrito) {
            $data = [
                'message' => 'Carrito no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'tipopago' => 'max:255',
            'costoenvio' => 'digits:6',
            'estado' => 'max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('tipopago')) {
            $carrito->tipopago = $request->tipopago;
        }

        if ($request->has('costoenvio')) {
            $carrito->costoenvio = $request->costoenvio;
        }
        
        if ($request->has('estado')) {
            $carrito->estado = $request->estado;
        }

        $carrito->save();

        $data = [
            'message' => 'Carrito actualizado',
            'carrito' => $carrito,
            'status' => 200
        ];

        return response()->json($data,200);
    }
    
}