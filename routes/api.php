<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivroController;
use App\http\Controllers\TestamentoController;
use App\Http\Controllers\VersiculoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class,
    ]);
});


Route::post('/login',[ AuthController::class, 'Login' ]);
Route::post('/register',[ AuthController::class, 'Register' ]);
