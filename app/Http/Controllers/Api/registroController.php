<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\registro;
use Illuminate\Support\Facades\Validator;

class registroController extends controller
{
    public function index()
    {
        $registro = Registro::all();

        $data= [
            'registro'=> $registro,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
        'tipodocumento' => 'required|max:255',
        'nrodocumento' => 'required|digits:10',
        'primernombre'  => 'required|max:255',
        'segundonombre'  => 'required|max:255',
        'primerapellido'  => 'required|max:255',
        'segundoapellido'  => 'required|max:255',
        'fechaexpedicion'  => 'required|max:255',
        'fechanacimiento'  => 'required|max:255',
        'nrocelular'  => 'required|digits:10',
        'correo'  => 'required|email',
        'contraseña'  => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion del registro",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $registro = Registro::create([
        'tipodocumento' =>$request->tipodocumento,
        'nrodocumento' =>$request->nrodocumento,
        'primernombre'  =>$request->primernombre,
        'segundonombre' =>$request->segundonombre,
        'primerapellido' =>$request->primerapellido,
        'segundoapellido' =>$request->segundoapellido,
        'fechaexpedicion' =>$request->fechaexpedicion,
        'fechanacimiento' =>$request->fechanacimiento,
        'nrocelular' =>$request->nrocelular,
        'correo' =>$request->correo,
        'contraseña' =>$request->contraseña,
        ]);

        if (!$registro) {
            $data = [
                "mensaje " => "Error al crear el registro",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "registro" => $registro,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $registro = Registro::find($id);
            
        if (!$registro) {
            $data = [
                'message' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'registro' => $registro,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $registro = Registro::find($id);  

        if (!$registro) {
            $data = [
                'message' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $registro -> delete();

        $data = [
            'message' => 'Registro eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $registro = Registro::find($id);

        if (!$registro) {
            $data = [
                'message' => 'Registro no encontrado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            
        'tipodocumento' => 'required|max:255',
        'nrodocumento' => 'required|digits:10',
        'primernombre'  => 'required|max:255',
        'segundonombre'  => 'required|max:255',
        'primerapellido'  => 'required|max:255',
        'segundoapellido'  => 'required|max:255',
        'fechaexpedicion'  => 'required|max:255',
        'fechanacimiento'  => 'required|max:255',
        'nrocelular'  => 'required|digits:10',
        'correo'  => 'required|email',
        'contraseña'  => 'required|max:255'
            
            ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $registro->tipodocumento = $request->tipodocumento;
        $registro->nrodocumento = $request->nrodocumento;
        $registro->primernombre = $request->primernombre;
        $registro->segundonombre = $request->segundonombre;
        $registro->primerapellido = $request->primerapellido;
        $registro->segundoapellido = $request->segundoapellido;
        $registro->fechaexpedicion = $request->fechaexpedicion;
        $registro->fechanacimiento = $request->fechanacimiento;
        $registro->nrocelular = $request->nrocelular;
        $registro->correo = $request->correo;
        $registro->contraseña = $request->contraseña;

        $registro->save();

        $data = [
            'message' => 'Registro actualizado',
            'registro' => $registro,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $registro = Registro::find($id);

        if (!$registro) {
            $data = [
                'message' => 'Registro no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            
            'tipodocumento' => 'max:255',
            'nrodocumento' => 'digits:10',
            'primernombre'  => 'max:255',
            'segundonombre'  => 'max:255',
            'primerapellido'  => 'max:255',
            'segundoapellido'  => 'max:255',
            'fechaexpedicion'  => 'max:255',
            'fechanacimiento'  => 'max:255',
            'nrocelular'  => 'digits:10',
            'correo'  => 'email',
            'contraseña'  => 'max:255'
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('tipodocumento')) {
            $registro->tipodocumento = $request->tipodocumento;
        }

        if ($request->has('nrodocumento')) {
            $registro->nrodocumento = $request->nrodocumento;
        }
        
        if ($request->has('primernombre')) {
            $registro->primernombre = $request->primernombre;
        }

        if ($request->has('segundonombre')) {
            $registro->segundonombre = $request->segundonombre;
        }

        if ($request->has('primerapellido')) {
            $registro->primerapellido = $request->primerapellido;
        }

        if ($request->has('segundoapellido')) {
            $registro->segundoapellido = $request->segundoapellido;
        }

        if ($request->has('fechaexpedicion')) {
            $registro->fechaexpedicion = $request->fechaexpedicion;
        }

        if ($request->has('fechanacimiento')) {
            $registro->fechanacimiento = $request->fechanacimiento;
        }

        if ($request->has('nrocelular')) {
            $registro->nrocelular = $request->nrocelular;
        }

        if ($request->has('correo')) {
            $registro->correo = $request->correo;
        }

        if ($request->has('contraseña')) {
            $registro->contraseña = $request->contraseña;
        }

        $registro->save();

        $data = [
            'message' => 'Registro actualizado',
            'registro' => $registro,
            'status' => 200
        ];

        return response()->json($data,200);
    }

}