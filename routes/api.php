<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(ProduitController::class)->group(function () {
    Route::post('produit', 'create');
    Route::get('produit', 'get');
    Route::patch('produit/{id}', 'update');
   // Route::post('refresh', 'refresh');
});
