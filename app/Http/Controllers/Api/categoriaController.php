<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\Validator;

class categoriaController extends controller
{
    public function index()
    {
        $categoria = Categoria::all();

        $data= [
            'categoria'=> $categoria,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
        'tamaño' => 'required|digits:4',
        'marca'  => 'required|max:255',
        'color' => 'required|max:255',
        'material' => 'required|max:255',
        'procesador' => 'required|max:255',
        'RAM' => 'required|digits:3',
        'almacenamiento' => 'required|digits:3'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion de categoria",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $categoria = Categoria::create([
        'nombre' =>$request->nombre,
        'tamaño' =>$request->tamaño,
        'marca'  =>$request->marca,
        'color' =>$request->color,
        'material' =>$request->material,
        'procesador' =>$request->procesador,
        'RAM' =>$request->RAM,
        'almacenamiento' =>$request->almacenamiento
        ]);

        if (!$categoria) {
            $data = [
                "mensaje " => "Error al crear la categoria",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "categoria" => $categoria,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $categoria = Categoria::find($id);
            
        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'categoria' => $categoria,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);  

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $categoria -> delete();

        $data = [
            'message' => 'Categoria eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'tamaño' => 'required|digits:4',
            'marca'  => 'required|max:255',
            'color' => 'required|max:255',
            'material' => 'required|max:255',
            'procesador' => 'required|max:255',
            'RAM' => 'required|digits:3',
            'almacenamiento' => 'required|digits:3'
            ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $categoria->nombre = $request->nombre;
        $categoria->tamaño = $request->tamaño;
        $categoria->marca = $request->marca;
        $categoria->color = $request->color;
        $categoria->material = $request->material;
        $categoria->procesador = $request->procesador;
        $categoria->RAM = $request->RAM;
        $categoria->almacenamiento = $request->almacenamiento;

        $categoria->save();

        $data = [
            'message' => 'Categoria actualizado',
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'max:255',
            'tamaño' => 'digits:4',
            'marca'  => 'max:255',
            'color' => 'max:255',
            'material' => 'max:255',
            'procesador' => 'max:255',
            'RAM' => 'digits:3',
            'almacenamiento' => 'digits:3'
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $categoria->nombre = $request->nombre;
        }

        if ($request->has('tamaño')) {
            $categoria->tamaño = $request->tamaño;
        }
        
        if ($request->has('marca')) {
            $categoria->marca = $request->marca;
        }

        if ($request->has('color')) {
            $categoria->color = $request->color;
        }

        if ($request->has('material')) {
            $categoria->material = $request->material;
        }

        if ($request->has('procesador')) {
            $categoria->procesador = $request->procesador;
        }

        if ($request->has('RAM')) {
            $categoria->RAM = $request->RAM;
        }

        if ($request->has('almacenamiento')) {
            $categoria->almacenamiento = $request->almacenamiento;
        }

        $categoria->save();

        $data = [
            'message' => 'Categoria actualizada',
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data,200);

        }

}