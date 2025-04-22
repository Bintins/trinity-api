<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\devoluciones;
use Illuminate\Support\Facades\Validator;

class devolucionesController extends controller
{
    public function index()
    {
        $devoluciones = Devoluciones::all();

        $data= [
            'devoluciones'=> $devoluciones,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
        'fecha' => 'required|max:255',
        'lugar' => 'required|max:255',
        'detalles'  => 'required|max:255',
        'idventa' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de devoluciones",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $devoluciones = Devoluciones::create([
        'fecha' =>$request->fecha,
        'lugar' =>$request->lugar,
        'detalles'  =>$request->detalles,
        'idventa' =>$request->idventa
        ]);

        if (!$devoluciones) {
            $data = [
                "mensaje " => "Error al crear la devolución",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "devoluciones" => $devoluciones,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $devoluciones = Devoluciones::find($id);
            
        if (!$devoluciones) {
            $data = [
                'message' => 'Devolución no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'devoluciones' => $devoluciones,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $devoluciones = Devoluciones::find($id);  

        if (!$devoluciones) {
            $data = [
                'message' => 'Devolución no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $devoluciones -> delete();

        $data = [
            'message' => 'Devolución eliminada',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $devoluciones = Devoluciones::find($id);

        if (!$devoluciones) {
            $data = [
                'message' => 'Devolución no encontrada',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'referencia' => 'required|max:255',
            'precio' => 'required|digits:6',
            'reddatos'  => 'required|max:255',
            'capacidadbateria' => 'required|max:255',
            'combo' => 'required|max:255',
            
            ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $devoluciones->fecha = $request->fecha;
        $devoluciones->lugar = $request->lugar;
        $devoluciones->detalles = $request->detalles;
        $devoluciones->idventa = $request->idventa;

        $devoluciones->save();

        $data = [
            'message' => 'Devolución actualizada',
            'devoluciones' => $devoluciones,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $devoluciones = Devoluciones::find($id);

        if (!$devoluciones) {
            $data = [
                'message' => 'Devolución no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'referencia' => 'max:255',
            'precio' => 'digits:6',
            'reddatos'  => 'max:255',
            'capacidadbateria' => 'max:255',
            'combo' => 'max:255',
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('fecha')) {
            $devoluciones->fecha = $request->fecha;
        }

        if ($request->has('lugar')) {
            $devoluciones->lugar = $request->lugar;
        }
        
        if ($request->has('explicacion')) {
            $devoluciones->explicacion = $request->explicacion;
        }

        if ($request->has('idventa')) {
            $devoluciones->idventa = $request->idventa;
        }

        $devoluciones->save();

        $data = [
            'message' => 'Devolución actualizada',
            'devoluciones' => $devoluciones,
            'status' => 200
        ];

        return response()->json($data,200);
    }

}