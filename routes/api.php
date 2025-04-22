<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\carritoController;
use App\Http\Controllers\Api\categoriaController;
use App\Http\Controllers\Api\subcategoriaController;
use App\Http\Controllers\Api\devolucionesController;
use App\Http\Controllers\Api\proveedoresController;
use App\Http\Controllers\Api\registroproductoController;
use App\Http\Controllers\Api\registroController;
use App\Http\Controllers\Api\ventaController;
use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\stockController;


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/auth/profile', [AuthController::class, 'profile']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
});

Route::get('/carrito', [carritoController::class, 'index']);
Route::get('/carrito/{id}', [carritoController::class, 'show']);
Route::post('/carrito', [carritoController::class, 'store']);
Route::put('/carrito/{id}', [carritoController::class, 'update']);
Route::patch('/carrito/{id}', [carritoController::class, 'updatePartial']);
Route::delete('/carrito/{id}', [carritoController::class, 'destroy']);

Route::get('/categoria', [categoriaController::class, 'index']);
Route::get('/categoria/{id}', [categoriaController::class, 'show']);
Route::post('/categoria', [categoriaController::class, 'store']);
Route::put('/categoria/{id}', [categoriaController::class, 'update']);
Route::patch('/categoria/{id}', [categoriaController::class, 'updatePartial']);
Route::delete('/categoria/{id}', [categoriaController::class, 'destroy']);

Route::get('/subcategoria', [subcategoriaController::class, 'index']);
Route::get('/subcategoria/{id}', [subcategoriaController::class, 'show']);
Route::post('/subcategoria', [subcategoriaController::class, 'store']);
Route::put('/subcategoria/{id}', [subcategoriaController::class, 'update']);
Route::patch('/subcategoria/{id}', [subcategoriaController::class, 'updatePartial']);
Route::delete('/subcategoria/{id}', [subcategoriaController::class, 'destroy']);

Route::get('/devoluciones', [devolucionesController::class, 'index']);
Route::get('/devoluciones/{id}', [devolucionesController::class, 'show']);
Route::post('/devoluciones', [devolucionesController::class, 'store']);
Route::put('/devoluciones/{id}', [devolucionesController::class, 'update']);
Route::patch('/devoluciones/{id}', [devolucionesController::class, 'updatePartial']);
Route::delete('/devoluciones/{id}', [devolucionesController::class, 'destroy']);

Route::get('/proveedores', [proveedoresController::class, 'index']);
Route::get('/proveedores/{id}', [proveedoresController::class, 'show']);
Route::post('/proveedores', [proveedoresController::class, 'store']);
Route::put('/proveedores/{id}', [proveedoresController::class, 'update']);
Route::patch('/proveedores/{id}', [proveedoresController::class, 'updatePartial']);
Route::delete('/proveedores/{id}', [proveedoresController::class, 'destroy']);

Route::get('/registro', [registroController::class, 'index']);
Route::get('/registro/{id}', [registroController::class, 'show']);
Route::post('/registro', [registroController::class, 'store']);
Route::put('/registro/{id}', [registroController::class, 'update']);
Route::patch('/registro/{id}', [registroController::class, 'updatePartial']);
Route::delete('/registro/{id}', [registroController::class, 'destroy']);

Route::get('/registroproducto', [registroproductoController::class, 'index']);
Route::get('/registroproducto/{id}', [registroproductoController::class, 'show']);
Route::post('/registroproducto', [registroproductoController::class, 'store']);
Route::put('/registroproducto/{id}', [registroproductoController::class, 'update']);
Route::patch('/registroproducto/{id}', [registroproductoController::class, 'updatePartial']);
Route::delete('/registroproducto/{id}', [registroproductoController::class, 'destroy']);

Route::get('/venta', [ventaController::class, 'index']);
Route::get('/venta/{id}', [ventaController::class, 'show']);
Route::post('/venta', [ventaController::class, 'store']);
Route::put('/venta/{id}', [ventaController::class, 'update']);
Route::patch('/venta/{id}', [ventaController::class, 'updatePartial']);
Route::delete('/venta/{id}', [ventaController::class, 'destroy']);

Route::get('/usuario', [usuarioController::class, 'index']);
Route::get('/usuario/{id}', [usuarioController::class, 'show']);
Route::post('/usuario', [usuarioController::class, 'store']);
Route::put('/usuario/{id}', [usuarioController::class, 'update']);
Route::patch('/usuario/{id}', [usuarioController::class, 'updatePartial']);
Route::delete('/usuario/{id}', [usuarioController::class, 'destroy']);

Route::get('/stock', [stockController::class, 'index']);
Route::get('/stock/{id}', [stockController::class, 'show']);
Route::post('/stock', [stockController::class, 'store']);
Route::put('/stock/{id}', [stockController::class, 'update']);
Route::patch('/stock/{id}', [stockController::class, 'updatePartial']);
Route::delete('/stock/{id}', [stockController::class, 'destroy']);

