<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\MahasiswaController;
use App\http\Controllers\BukuController;
use App\http\Controllers\JurusanController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[MahasiswaController::class,'getmahasiswa']);
Route::get('/getid/{id}',[MahasiswaController::class,'getid']);
Route::post('/createmahasiswa',[MahasiswaController::class,'createmahasiswa']);
Route::put('/updatemahasiswa/{id}',[MahasiswaController::class,'updatemahasiswa']);
Route::delete('/deletemahasiswa/{id}',[MahasiswaController::class,'deletemahasiswa']);


Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::get('/getid/{id}',[BukuController::class,'getid']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);
Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);

Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
Route::get('/getid/{id}',[JurusanController::class,'getid']);
Route::post('/createjurusan',[JurusanController::class,'createjurusan']);
Route::put('/updatejurusan/{id}',[JurusanController::class,'updatejurusan']);
Route::delete('/deletejurusan/{id}',[JurusanController::class,'deletejurusan']);