<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\registroproducto;
use Illuminate\Support\Facades\Validator;

class registroproductoController extends controller
{
    public function index()
    {
        $registroproducto = Registroproducto::all();

        $data= [
            'registroproducto'=> $registroproducto,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
            'nombre' => 'required|max:255',
            'color' => 'required|max:255',
            'capacidad' => 'required|max:255',
            'lectorhuella' => 'required|max:255',
            'caracteristicas' => 'required|max:255',
            'sistemaoperativo' => 'required|max:255',
            'marca' => 'required|max:255',
            'numeronucleos' => 'required|digits:10',
            'ram' => 'required|digits:4',
            'versionsistemaoperativo' => 'required|max:255',
            'velocidadprocesador' => 'required|max:255',
            'tamañopantalla' => 'required|max:255',
            'resolucionpantalla' => 'required|max:255',
            'tipopantalla' => 'required|max:255',
            'tipocamarafrontal' => 'required|max:255',
            'tipocamaraposterior' => 'required|max:255',
            'resolucioncamarafrontal' => 'required|max:255',
            'resolucioncamaraposterior' => 'required|max:255',
            'resolucionotrascamaras' => 'required|max:255',
            'flashfrontal' => 'required|max:255',
            'flashposterior' => 'required|max:255',
            'reddatos' => 'required|max:255',
            'espaciossim' => 'required|max:255',
            'fuentesalimentacionenergias' => 'required|max:255',
            'opcionesconectividad' => 'required|max:255',
            'tipospuertosentradassalidas' => 'required|max:255',
            'capacidadbateria' => 'required|max:255',
            'resistenciaagua' => 'required|max:255',
            'garantia' => 'required|max:255',
            'quenoincluye' => 'required|max:255',
            'queincluye' => 'required|max:255'

        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion del registro de los productos",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $registroproducto = Registroproducto::create([

        'nombre' =>$request->nombre,
        'color' =>$request->color,
        'capacidad'  =>$request->capacidad,
        'lectorhuella' =>$request->lectorhuella,
        'caracteristicas' =>$request->caracteristicas,
        'sistemaoperativo' =>$request->sistemaoperativo,
        'marca' =>$request->marca,
        'numeronucleos' =>$request->numeronucleos,
        'ram' =>$request->ram,
        'versionsistemaoperativo' =>$request->versionsistemaoperativo,
        'velocidadprocesador' =>$request->velocidadprocesador,
        'tamañopantalla' =>$request->tamañopantalla,
        'resolucionpantalla' =>$request->resolucionpantalla,
        'tipopantalla' =>$request->tipopantalla,
        'tipocamarafrontal' =>$request->tipocamarafrontal,
        'tipocamaraposterior' =>$request->tipocamaraposterior,
        'resolucioncamarafrontal' =>$request->resolucioncamarafrontal,
        'resolucioncamaraposterior' =>$request->resolucioncamaraposterior,
        'resolucionotrascamaras' =>$request->resolucionotrascamaras,
        'flashfrontal' =>$request->flashfrontal,
        'flashposterior' =>$request->flashposterior,
        'reddatos' =>$request->reddatos,
        'espaciossim' =>$request->espaciossim,
        'fuentesalimentacionenergias' =>$request->fuentesalimentacionenergias,
        'opcionesconectividad' =>$request->opcionesconectividad,
        'tipospuertosentradassalidas' =>$request->tipospuertosentradassalidas,
        'capacidadbateria' =>$request->capacidadbateria,
        'resistenciaagua' =>$request->resistenciaagua,
        'garantia' =>$request->garantia,
        'quenoincluye' =>$request->quenoincluye,
        'queincluye' =>$request->queincluye,
        ]);

        if (!$registroproducto) {
            $data = [
                "mensaje " => "Error al crear el registro del producto",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "registroproducto" => $registroproducto,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $registroproducto = Registroproducto::find($id);
            
        if (!$registroproducto) {
            $data = [
                'message' => 'Registro de producto especifico no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'registroproducto' => $registroproducto,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $registroproducto = Registroproducto::find($id);  

        if (!$registroproducto) {
            $data = [
                'message' => 'Registro de producto especifico no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $registroproducto -> delete();

        $data = [
            'message' => 'Registro de producto eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $registroproducto = Registroproducto::find($id);

        if (!$registroproducto) {
            $data = [
                'message' => 'Registro de producto no encontrado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            
            'nombre' => 'required|max:255',
            'color' => 'required|max:255',
            'capacidad' => 'required|max:255',
            'lectorhuella' => 'required|max:255',
            'caracteristicas' => 'required|max:255',
            'sistemaoperativo' => 'required|max:255',
            'marca' => 'required|max:255',
            'numeronucleos' => 'required|digits:10',
            'ram' => 'required|digits:4',
            'versionsistemaoperativo' => 'required|max:255',
            'velocidadprocesador' => 'required|max:255',
            'tamañopantalla' => 'required|max:255',
            'resolucionpantalla' => 'required|max:255',
            'tipopantalla' => 'required|max:255',
            'tipocamarafrontal' => 'required|max:255',
            'tipocamaraposterior' => 'required|max:255',
            'resolucioncamarafrontal' => 'required|max:255',
            'resolucioncamaraposterior' => 'required|max:255',
            'resolucionotrascamaras' => 'required|max:255',
            'flashfrontal' => 'required|max:255',
            'flashposterior' => 'required|max:255',
            'reddatos' => 'required|max:255',
            'espaciossim' => 'required|max:255',
            'fuentesalimentacionenergias' => 'required|max:255',
            'opcionesconectividad' => 'required|max:255',
            'tipospuertosentradassalidas' => 'required|max:255',
            'capacidadbateria' => 'required|max:255',
            'resistenciaagua' => 'required|max:255',
            'garantia' => 'required|max:255',
            'quenoincluye' => 'required|max:255',
            'queincluye' => 'required|max:255'
            
            ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $registroproducto->nombre = $request->nombre;
        $registroproducto->color = $request->color;
        $registroproducto->capacidad  = $request->capacidad;
        $registroproducto->lectorhuella = $request->lectorhuella;
        $registroproducto->caracteristicas = $request->caracteristicas;
        $registroproducto->sistemaoperativo = $request->sistemaoperativo;
        $registroproducto->marca = $request->marca;
        $registroproducto->numeronucleos = $request->numeronucleos;
        $registroproducto->ram = $request->ram;
        $registroproducto->versionsistemaoperativo = $request->versionsistemaoperativo;
        $registroproducto->velocidadprocesador = $request->velocidadprocesador;
        $registroproducto->tamañopantalla = $request->tamañopantalla;
        $registroproducto->resolucionpantalla = $request->resolucionpantalla;
        $registroproducto->tipopantalla = $request->tipopantalla;
        $registroproducto->tipocamarafrontal = $request->tipocamarafrontal;
        $registroproducto->tipocamaraposterior = $request->tipocamaraposterior;
        $registroproducto->resolucioncamarafrontal = $request->resolucioncamarafrontal;
        $registroproducto->resolucioncamaraposterior = $request->resolucioncamaraposterior;
        $registroproducto->resolucionotrascamaras = $request->resolucionotrascamaras;
        $registroproducto->flashfrontal = $request->flashfrontal;
        $registroproducto->flashposterior = $request->flashposterior;
        $registroproducto->reddatos = $request->reddatos;
        $registroproducto->espaciossim = $request->espaciossim;
        $registroproducto->fuentesalimentacionenergias = $request->fuentesalimentacionenergias;
        $registroproducto->opcionesconectividad = $request->opcionesconectividad;
        $registroproducto->tipospuertosentradassalidas = $request->tipospuertosentradassalidas;
        $registroproducto->capacidadbateria = $request->capacidadbateria;
        $registroproducto->resistenciaagua = $request->resistenciaagua;
        $registroproducto->garantia = $request->garantia;
        $registroproducto->quenoincluye = $request->quenoincluye;
        $registroproducto->queincluye = $request->queincluye;

        $registroproducto->save();

        $data = [
            'message' => 'Registro de productos actualizado',
            'registroproducto' => $registroproducto,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $registroproducto = Registroproducto::find($id);

        if (!$registroproducto) {
            $data = [
                'message' => 'Registro de producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            
            'nombre' => 'max:255',
            'color' => 'max:255',
            'capacidad' => 'max:255',
            'lectorhuella' => 'max:255',
            'caracteristicas' => 'max:255',
            'sistemaoperativo' => 'max:255',
            'marca' => 'max:255',
            'numeronucleos' => 'digits:10',
            'ram' => 'digits:4',
            'versionsistemaoperativo' => 'max:255',
            'velocidadprocesador' => 'max:255',
            'tamañopantalla' => 'max:255',
            'resolucionpantalla' => 'max:255',
            'tipopantalla' => 'max:255',
            'tipocamarafrontal' => 'max:255',
            'tipocamaraposterior' => 'max:255',
            'resolucioncamarafrontal' => 'max:255',
            'resolucioncamaraposterior' => 'max:255',
            'resolucionotrascamaras' => 'max:255',
            'flashfrontal' => 'max:255',
            'flashposterior' => 'max:255',
            'reddatos' => 'max:255',
            'espaciossim' => 'max:255',
            'fuentesalimentacionenergias' => 'max:255',
            'opcionesconectividad' => 'max:255',
            'tipospuertosentradassalidas' => 'max:255',
            'capacidadbateria' => 'max:255',
            'resistenciaagua' => 'max:255',
            'garantia' => 'max:255',
            'quenoincluye' => 'max:255',
            'queincluye' => 'max:255'
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $registroproducto->nombre = $request->nombre;
        }

        if ($request->has('color')) {
            $registroproducto->color = $request->color;
        }
        
        if ($request->has('capacidad')) {
            $registroproducto->capacidad = $request->capacidad;
        }

        if ($request->has('lectorhuella')) {
            $registroproducto->lectorhuella = $request->lectorhuella;
        }

        if ($request->has('caracteristicas')) {
            $registroproducto->caracteristicas = $request->caracteristicas;
        }

        if ($request->has('sistemaoperativo')) {
            $registroproducto->sistemaoperativo = $request->sistemaoperativo;
        }

        if ($request->has('marca')) {
            $registroproducto->marca = $request->marca;
        }

        if ($request->has('numeronucleos')) {
            $registroproducto->numeronucleos = $request->numeronucleos;
        }

        if ($request->has('ram')) {
            $registroproducto->ram = $request->ram;
        }

        if ($request->has('versionsistemaoperativo')) {
            $registroproducto->versionsistemaoperativo = $request->versionsistemaoperativo;
        }

        if ($request->has('velocidadprocesador')) {
            $registroproducto->velocidadprocesador = $request->velocidadprocesador;
        }

        if ($request->has('tamañopantalla')) {
            $registroproducto->tamañopantalla = $request->tamañopantalla;
        }

        if ($request->has('resolucionpantalla')) {
            $registroproducto->resolucionpantalla = $request->resolucionpantalla;
        }

        if ($request->has('tipopantalla')) {
            $registroproducto->tipopantalla = $request->tipopantalla;
        }

        if ($request->has('tipocamarafrontal')) {
            $registroproducto->tipocamarafrontal = $request->tipocamarafrontal;
        }

        if ($request->has('tipocamaraposterior')) {
            $registroproducto->tipocamaraposterior = $request->tipocamaraposterior;
        }

        if ($request->has('resolucioncamarafrontal')) {
            $registroproducto->resolucioncamarafrontal = $request->resolucioncamarafrontal;
        }

        if ($request->has('resolucioncamaraposterior')) {
            $registroproducto->resolucioncamaraposterior = $request->resolucioncamaraposterior;
        }

        if ($request->has('resolucionotrascamaras')) {
            $registroproducto->resolucionotrascamaras = $request->resolucionotrascamaras;
        }

        if ($request->has('flashfrontal')) {
            $registroproducto->flashfrontal = $request->flashfrontal;
        }

        if ($request->has('flashposterior')) {
            $registroproducto->flashposterior = $request->flashposterior;
        }

        if ($request->has('reddatos')) {
            $registroproducto->reddatos = $request->reddatos;
        }

        if ($request->has('espaciossim')) {
            $registroproducto->espaciossim = $request->espaciossim;
        }

        if ($request->has('fuentesalimentacionenergias')) {
            $registroproducto->fuentesalimentacionenergias = $request->fuentesalimentacionenergias;
        }

        if ($request->has('opcionesconectividad')) {
            $registroproducto->opcionesconectividad = $request->opcionesconectividad;
        }

        if ($request->has('tipospuertosentradassalidas')) {
            $registroproducto->tipospuertosentradassalidas = $request->tipospuertosentradassalidas;
        }

        if ($request->has('capacidadbateria')) {
            $registroproducto->capacidadbateria = $request->capacidadbateria;
        }

        if ($request->has('resistenciaagua')) {
            $registroproducto->resistenciaagua = $request->resistenciaagua;
        }

        if ($request->has('garantia')) {
            $registroproducto->garantia = $request->garantia;
        }

        if ($request->has('quenoincluye')) {
            $registroproducto->quenoincluye = $request->quenoincluye;
        }

        if ($request->has('queincluye')) {
            $registroproducto->queincluye = $request->queincluye;
        }

        $registroproducto->save();

        $data = [
            'message' => 'Registro de producto actualizado',
            'registroproducto' => $registroproducto,
            'status' => 200
        ];

        return response()->json($data,200);
    }

}