<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\pdccontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('status', 'Api\pdccontroller@status');
Route::get('status', [pdccontroller::class, 'status']);

route::namespace('Api')->group(function (){
    route::post('produto/add',[pdccontroller::class,'add']);
    route::get('produto',[pdccontroller::class,'list']);
    route::get('produto/{id}', [pdccontroller::class,'select']);
    route::put('produto/{id}', [pdccontroller::class,'update']);
    route::delete('produto/{id}', [pdccontroller::class,'delete']);

});
