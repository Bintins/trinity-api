<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stock;
use Illuminate\Support\Facades\Validator;

class stockController extends controller
{
    public function index()
    {
        $stock = Stock::all();

        $data= [
            'stock'=> $stock,
            'status' => 200
            ];
            return response() ->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tecno' => 'required|max:255',
            'xiaomi' => 'required|max:255',
            'oppo' => 'required|max:255',
            'huawei' => 'required|max:255',
            'samsung' => 'required|max:255',
            'iphone' => 'required|max:255',
            'motorola' => 'required|max:255',
            'poco' => 'required|max:255',
            'asus' => 'required|max:255',
            'razer' => 'required|max:255',
            'lenovo' => 'required|max:255',
            'hp' => 'required|max:255',
            'acer' => 'required|max:255',
            'apple' => 'required|max:255',
            'componentetec' => 'required|max:255',
            'componentexia' => 'required|max:255',
            'componenteoppo' => 'required|max:255',
            'componentehua' => 'required|max:255',
            'componentesam' => 'required|max:255',
            'componenteiph' => 'required|max:255',
            'componentemoto' => 'required|max:255',
            'componentepoco' => 'required|max:255',
            'componenteasus' => 'required|max:255',
            'componenterazer' => 'required|max:255',
            'componenteleno' => 'required|max:255',
            'componentehp' => 'required|max:255',
            'componenteacer' => 'required|max:255',
            'componenteapple' => 'required|max:255',
            'equiobsoletos' => 'required|max:255',
            'componbsoletos' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                "mesaje " => "Error en la validacion del stock",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $stock = Stock::create([
            'tecno' =>$request->tecno,
            'xiaomi' =>$request->xiaomi,
            'oppo' =>$request->oppo,
            'huawei' =>$request->huawei,
            'samsung' =>$request->samsung,
            'iphone' =>$request->iphone,
            'motorola' =>$request->motorola,
            'poco' =>$request->poco,
            'asus' =>$request->asus,
            'razer' =>$request->razer,
            'lenovo' =>$request->lenovo,
            'hp' =>$request->hp,
            'acer' =>$request->acer,
            'apple' =>$request->apple,
            'componentetec' =>$request->componentetec,
            'componentexia' =>$request->componentexia,
            'componenteoppo' =>$request->componenteoppo,
            'componentehua' =>$request->componentehua,
            'componentesam' =>$request->componentesam,
            'componenteiph' =>$request->componenteiph,
            'componentemoto' =>$request->componentemoto,
            'componentepoco' =>$request->componentepoco,
            'componenteasus' =>$request->componenteasus,
            'componenterazer' =>$request->componenterazer,
            'componenteleno' =>$request->componenteleno,
            'componentehp' =>$request->componentehp,
            'componenteacer' =>$request->componenteacer,
            'componenteapple' =>$request->componenteapple,
            'equiobsoletos' =>$request->equiobsoletos,
            'componbsoletos' =>$request->componbsoletos
        ]);

        if (!$stock) {
            $data = [
                "mensaje " => "Error al crear en el stock",
                "status" => 500
            ];

            return response()->json($data, 500);

            $data = [
                "stock" => $stock,
                "status" => 201
            ];

            return response()->json($data, 201);
        }
    }

    public function show ($id) 
    {
        $stock = Stock::find($id);
            
        if (!$stock) {
            $data = [
                'message' => 'En el stock no se ha encontrado lo solicitado',
                'status' => 404
            ];
            return response()->json($data, 404);

            $data = [
                'stock' => $stock,
                'status' => 200
            ];
            return response()->json($data, 200);
        }   
    }

    public function destroy($id)
    {
        $stock = Stock::find($id);  

        if (!$stock) {
            $data = [
                'message' => 'En el stock no se ha encontrado lo solicitado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $stock -> delete();

        $data = [
            'message' => 'Registro de stock eliminado',
            'status' => '200'
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            $data = [
                'message' => 'En el stock no se ha encontrado lo solicitado',
                'status' => '404'
        ];
        return response()->json($data,404);
        }

        $validator = Validator::make($request->all(), [
            'tecno' => 'required|max:255',
            'xiaomi' => 'required|max:255',
            'oppo' => 'required|max:255',
            'huawei' => 'required|max:255',
            'samsung' => 'required|max:255',
            'iphone' => 'required|max:255',
            'motorola' => 'required|max:255',
            'poco' => 'required|max:255',
            'asus' => 'required|max:255',
            'razer' => 'required|max:255',
            'lenovo' => 'required|max:255',
            'hp' => 'required|max:255',
            'acer' => 'required|max:255',
            'apple' => 'required|max:255',
            'componentetec' => 'required|max:255',
            'componentexia' => 'required|max:255',
            'componenteoppo' => 'required|max:255',
            'componentehua' => 'required|max:255',
            'componentesam' => 'required|max:255',
            'componenteiph' => 'required|max:255',
            'componentemoto' => 'required|max:255',
            'componentepoco' => 'required|max:255',
            'componenteasus' => 'required|max:255',
            'componenterazer' => 'required|max:255',
            'componenteleno' => 'required|max:255',
            'componentehp' => 'required|max:255',
            'componenteacer' => 'required|max:255',
            'componenteapple' => 'required|max:255',
            'equiobsoletos' => 'required|max:255',
            'componbsoletos' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $stock->tecno = $request->tecno;
        $stock->xiaomi = $request->xiaomi;
        $stock->oppo = $request->oppo;
        $stock->huawei = $request->huawei;
        $stock->samsung = $request->samsung;
        $stock->iphone = $request->iphone;
        $stock->motorola = $request->motorola;
        $stock->poco = $request->poco;
        $stock->asus = $request->asus;
        $stock->razer = $request->razer;
        $stock->lenovo = $request->lenovo;
        $stock->hp = $request->hp;
        $stock->acer = $request->acer;
        $stock->apple = $request->apple;
        $stock->componentetec = $request->componentetec;
        $stock->componentexia = $request->componentexia;
        $stock->componenteoppo = $request->componenteoppo;
        $stock->componentehua = $request->componentehua;
        $stock->componentesam = $request->componentesam;
        $stock->componenteiph = $request->componenteiph;
        $stock->componentemoto = $request->componentemoto;
        $stock->componentepoco = $request->componentepoco;
        $stock->componenteasus = $request->componenteasus;
        $stock->componenterazer = $request->componenterazer;
        $stock->componenteleno = $request->componenteleno;
        $stock->componentehp = $request->componentehp;
        $stock->componenteacer = $request->componenteacer;
        $stock->componenteapple = $request->componenteapple;
        $stock->equiobsoletos = $request->equiobsoletos;
        $stock->componbsoletos = $request->componbsoleto;

        $stock->save();

        $data = [
            'message' => 'El stock seleccionado ha sido actualizado',
            'stock' => $stock,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function updatePartial(Request $request, $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            $data = [
                'message' => 'En el stock no se ha encontrado lo solicitado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'tecno' => 'max:255',
            'xiaomi' => 'max:255',
            'oppo' => 'max:255',
            'huawei' => 'max:255',
            'samsung' => 'max:255',
            'iphone' => 'max:255',
            'motorola' => 'max:255',
            'poco' => 'max:255',
            'asus' => 'max:255',
            'razer' => 'max:255',
            'lenovo' => 'max:255',
            'hp' => 'max:255',
            'acer' => 'max:255',
            'apple' => 'max:255',
            'componentetec' => 'max:255',
            'componentexia' => 'max:255',
            'componenteoppo' => 'max:255',
            'componentehua' => 'max:255',
            'componentesam' => 'max:255',
            'componenteiph' => 'max:255',
            'componentemoto' => 'max:255',
            'componentepoco' => 'max:255',
            'componenteasus' => 'max:255',
            'componenterazer' => 'max:255',
            'componenteleno' => 'max:255',
            'componentehp' => 'max:255',
            'componenteacer' => 'max:255',
            'componenteapple' => 'max:255',
            'equiobsoletos' => 'max:255',
            'componbsoletos' => 'max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('tecno')) {
            $stock->tecno = $request->tecno;
        }

        if ($request->has('xiaomi')) {
            $stock->xiaomi = $request->xiaomi;
        }

        if ($request->has('oppo')) {
            $stock->oppo = $request->oppo;
        }

        if ($request->has('huawei')) {
            $stock->huawei = $request->huawei;
        }

        if ($request->has('samsung')) {
            $stock->samsung = $request->samsung;
        }

        if ($request->has('iphone')) {
            $stock->iphone = $request->iphone;
        }

        if ($request->has('motorola')) {
            $stock->motorola = $request->motorola;
        }

        if ($request->has('poco')) {
            $stock->poco = $request->poco;
        }

        if ($request->has('asus')) {
            $stock->asus = $request->asus;
        }

        if ($request->has('razer')) {
            $stock->razer = $request->razer;
        }

        if ($request->has('lenovo')) {
            $stock->lenovo = $request->lenovo;
        }

        if ($request->has('hp')) {
            $stock->hp = $request->hp;
        }

        if ($request->has('acer')) {
            $stock->acer = $request->acer;
        }
        
        if ($request->has('apple')) {
            $stock->apple = $request->apple;
        }

        if ($request->has('componentetec')) {
            $stock->componentetec = $request->componentetec;
        }

        if ($request->has('componentexia')) {
            $stock->componentexia = $request->componentexia;
        }

        if ($request->has('componenteoppo')) {
            $stock->componenteoppo = $request->componenteoppo;
        }

        if ($request->has('componentehua')) {
            $stock->componentehua = $request->componentehua;
        }

        if ($request->has('componentesam')) {
            $stock->componentesam = $request->componentesam;
        }

        if ($request->has('componenteiph')) {
            $stock->componenteiph = $request->componenteiph;
        }

        if ($request->has('componentemoto')) {
            $stock->componentemoto = $request->componentemoto;
        }

        if ($request->has('componentepoco')) {
            $stock->componentepoco = $request->componentepoco;
        }

        if ($request->has('componenteasus')) {
            $stock->componenteasus = $request->componenteasus;
        }

        if ($request->has('componenterazer')) {
            $stock->componenterazer = $request->componenterazer;
        }

        if ($request->has('componenteleno')) {
            $stock->componenteleno = $request->componenteleno;
        }

        if ($request->has('componentehp')) {
            $stock->componentehp = $request->componentehp;
        }

        if ($request->has('componenteacer')) {
            $stock->componenteacer = $request->componenteacer;
        }

        if ($request->has('componenteapple')) {
            $stock->componenteapple = $request->componenteapple;
        }

        if ($request->has('equiobsoletos')) {
            $stock->equiobsoletos = $request->equiobsoletos;
        }

        if ($request->has('componbsoletos')) {
            $stock->componbsoletos = $request->componbsoletos;
        }

        $stock->save();

        $data = [
            'message' => 'El stock seleccionado ha sido actualizado',
            'stock' => $stock,
            'status' => 200
        ];

        return response()->json($data,200);
    }
    
}