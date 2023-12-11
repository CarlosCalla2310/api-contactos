<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContactoController::class)->group(function () {
    Route::get('/contactos', 'index');
    Route::post('/contactos', 'store');
    Route::put('/contactos/{contacto}', 'update');
    Route::delete('/contactos/{contacto}', 'destroy');
});
