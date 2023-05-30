<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::groupby(function())
Route::middleware('auth')->prefix('patient')->group(function(){
    Route::get('/','App\Http\Controllers\PatientController@index')->name('patient');
    Route::post('/patient_store','App\Http\Controllers\PatientController@store')->name('patient.store'); 
}
);
Route::middleware(['auth',])->group(function () {
    Route::get('/quiz-home', 'App\Http\Controllers\QuizController@index');
Route::post('/quiz', 'App\Http\Controllers\QuizController@submit');

Route::post('/save-answer','App\Http\Controllers\QuizController@saveAnswer')->name('save_answer');

});
// Route::get('/quiz-home', 'App\Http\Controllers\QuizController@index');
// Route::post('/quiz', 'App\Http\Controllers\QuizController@submit');
route::get('/new-homw-trial','App\Http\Controllers\QuizController@newnew');
route::post('/quiz-submit','App\Http\Controllers\QuizController@ValidateAnswers')->name('quiz.submit');