<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subcategoria;
use Illuminate\Support\Facades\Validator;

class subcategoriaController extends controller
{
    public function index()
    {
        $subcategoria = Subcategoria::all();

        $data= [
            'subcategoria'=> $subcategoria,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
        'referencia' => 'required|max:255',
        'precio' => 'required|digits:6',
        'reddatos'  => 'required|max:255',
        'capacidadbateria' => 'required|max:255',
        'combo' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de subcategoria",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $subcategoria = Subcategoria::create([
        'referencia' =>$request->referencia,
        'precio' =>$request->precio,
        'reddatos'  =>$request->reddatos,
        'capacidadbateria' =>$request->capacidadbateria,
        'combo' =>$request->combo,
        ]);

        if (!$subcategoria) {
            $data = [
                "mensaje " => "Error al crear la subcategoria",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "subcategoria" => $subcategoria,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $subcategoria = Subcategoria::find($id);
            
        if (!$subcategoria) {
            $data = [
                'message' => 'Subcategoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'subcategoria' => $subcategoria,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $subcategoria = Subcategoria::find($id);  

        if (!$subcategoria) {
            $data = [
                'message' => 'Subcategoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $subcategoria -> delete();

        $data = [
            'message' => 'Subcategoria eliminada',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $subcategoria = Subcategoria::find($id);

        if (!$subcategoria) {
            $data = [
                'message' => 'Subcategoria no encontrada',
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

        $subcategoria->referencia = $request->referencia;
        $subcategoria->precio = $request->precio;
        $subcategoria->reddatos = $request->reddatos;
        $subcategoria->capacidadbateria = $request->capacidadbateria;
        $subcategoria->combo = $request->combo;

        $subcategoria->save();

        $data = [
            'message' => 'Subcategoria actualizada',
            'subcategoria' => $subcategoria,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $subcategoria = Subcategoria::find($id);

        if (!$subcategoria) {
            $data = [
                'message' => 'Subcategoria no encontrada',
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

        if ($request->has('referencia')) {
            $subcategoria->referencia = $request->referencia;
        }

        if ($request->has('precio')) {
            $subcategoria->precio = $request->precio;
        }
        
        if ($request->has('reddatos')) {
            $subcategoria->reddatos = $request->reddatos;
        }

        if ($request->has('capacidadbateria')) {
            $subcategoria->capacidadbateria = $request->capacidadbateria;
        }

        if ($request->has('combo')) {
            $subcategoria->combo = $request->combo;
        }

        $subcategoria->save();

        $data = [
            'message' => 'Subcategoria actualizada',
            'subcategoria' => $subcategoria,
            'status' => 200
        ];

        return response()->json($data,200);
    }

}