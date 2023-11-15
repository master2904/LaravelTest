<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;


Route::resource('/usuario',UserController::class);
Route::resource('/cliente',ClienteController::class);
Route::resource('/categoria',CategoriaController::class);
Route::resource('/producto',ProductoController::class);
Route::resource('/venta',VentaController::class);
Route::resource('/transaccion',TransaccionController::class);

//categoria
Route::get('/categoria/producto/{id}',[CategoriaController::class,'productosCategoria']);
//user
Route::get('/usuario/rol/{roles}',[UserController::class,'roles']);
Route::get('/usuario/imagen/{imagen}',[UserController::class,'image']);
Route::post('/usuario/imagen/',[UserController::class,'imageUpload']);
//producto
Route::get('/producto/imagen/{imagen}',[ProductoController::class,'image']);
Route::post('/producto/imagen/',[ProductoController::class,'imageUpload']);
//venta
Route::get('/ventas/reporte',[VentaController::class,'reporteCliente']); 

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('user','App\Http\Controllers\UsuarioController@getAuthenticatedUser');
});
Route::group(['middleware' => ['cors']], function () {
});