<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   // return view('welcome');
   return redirect('/login');
});

Route::get('/admin/login', function () {
     return view('auth/login');
    //return redirect('/login');
 });
 
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   Route::prefix('admin')->group(function () {      
         Route::get('/dashboard', [DashboardController::class, 'adminDashboard']);
         Route::get('/users/{filter?}', [UserController::class, 'index'])->name('users');
         Route::get('/answers-list', [AnswerController::class, 'getAnswerList']);
         Route::post('/updatestatus', [UserController::class, 'updateStatus']);
         Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
         Route::post('/addquestion', [QuestionController::class, 'store']);
         Route::post('/getquestions', [QuestionController::class, 'getQuestionDetail']);
         Route::post('/updatequesetion/{id}', [QuestionController::class, 'update']);
         Route::get('/deletequesetion/{id}', [QuestionController::class, 'destroy']);
         Route::get('/download/{id}', [AnswerController::class, 'download']);
         Route::get('/email/{id}', [AnswerController::class, 'emailSendToUser']);
   });
   
   Route::prefix('user')->group(function () {
      Route::get('/question-list', [QuestionController::class, 'getQuestionList']);
      Route::post('/answers', [AnswerController::class, 'store']);
      Route::get('/get-excel',[AnswerController::class, 'getExcel']);
   });   
});

require __DIR__.'/auth.php';
