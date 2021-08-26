<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['auth']], function(){



   

//Route::group( ['middleware' => [ 'auth:api' ]], static function () {

    Route::get('/items',[QuestionController::class,'getAllQuestionList']);
    Route::prefix('/item')->group(function (){
            Route::post('/store',[AnswerController::class,'store']);
            Route::put('/{id}',[UserController::class,'update']);
            Route::delete('/{id}',[UserController::class,'destroy']);
        }
    );
//});

