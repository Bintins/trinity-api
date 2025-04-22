<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\venta;
use Illuminate\Support\Facades\Validator;

class ventaController extends controller
{
    public function index()
    {
        $venta = Venta::all();

        $data= [
            'venta'=> $venta,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'cajaregistradora' => 'required|max:255',
            'producto' => 'required|max:255',
            'lugar' => 'required|max:255',
            'hora' => 'required|max:255',
            'fecha' => 'required|max:255',
            'estado' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de venta",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $venta = Venta::create([
            'cajaregistradora' =>$request->cajaregistradora,
            'producto'=>$request->producto,
            'lugar'=>$request->lugar,
            'hora'=>$request->hora,
            'fecha'=>$request->fecha,
            'estado'=>$request->estado
        ]);

        if (!$venta) {
            $data = [
                "mensaje " => "Error al crear la venta",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "venta" => $venta,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $venta = Venta::find($id);
            
        if (!$venta) {
            $data = [
                'message' => 'Venta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'venta' => $venta,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);  

        if (!$venta) {
            $data = [
                'message' => 'Venta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $venta -> delete();

        $data = [
            'message' => 'Venta eliminada',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            $data = [
                'message' => 'ventV no encontrada',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            
            'cajaregistradora' => 'required|max:255',
            'producto' => 'required|max:255',
            'lugar' => 'required|max:255',
            'hora' => 'required|max:255',
            'fecha' => 'required|max:255',
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

        $venta->cajaregistradora = $request->cajaregistradora;
        $venta->producto = $request->producto;
        $venta->lugar = $request->lugar;
        $venta->hora = $request->hora;
        $venta->fecha = $request->fecha;
        $venta->estado = $request->estado;

        $venta->save();

        $data = [
            'message' => 'Venta actualizada',
            'venta' => $venta,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            $data = [
                'message' => 'Venta no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            
            'cajaregistradora' => 'max:255',
            'producto' => 'max:255',
            'lugar' => 'max:255',
            'hora' => 'max:255',
            'fecha' => 'max:255',
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

        if ($request->has('cajaregistradora')) {
            $venta->cajaregistradora = $request->cajaregistradora;
        }

        if ($request->has('producto')) {
            $venta->producto = $request->producto;
        }
        
        if ($request->has('lugar')) {
            $venta->lugar = $request->lugar;
        }

        if ($request->has('hora')) {
            $venta->hora = $request->hora;
        }

        if ($request->has('fecha')) {
            $venta->fecha = $request->fecha;
        }

        if ($request->has('estado')) {
            $venta->estado = $request->estado;
        }

        $venta->save();

        $data = [
            'message' => 'Venta actualizada',
            'venta' => $venta,
            'status' => 200
        ];

        return response()->json($data,200);
    }
    
}