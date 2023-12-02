<?php

use App\Livewire\ListSurveys;
use App\Livewire\LiveSurvey;
use Illuminate\Support\Facades\Route;

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





Route::get('/', [App\Http\Controllers\SurveyController::class, 'index'])->name('home');
Route::post('/survey-create', [App\Http\Controllers\SurveyController::class, 'store'])->name('survey.store');
Route::get('/survey/{external_id}', [App\Http\Controllers\SurveyController::class, 'show'])->name('survey.show');
Route::get('/survey-result/{external_id}', [App\Http\Controllers\SurveyController::class, 'results'])->name('survey_result.show');
Route::get('/survey-end/{external_id}', [App\Http\Controllers\SurveyController::class, 'survey_end'])->name('survey.end');
Route::post('/word-create', [App\Http\Controllers\WordController::class, 'store'])->name('word.store');
Route::get('/ListSurvey', ListSurveys::class); // TODO: remove this route
Route::get('/{external_id}', LiveSurvey::class);
// Route::get('/{external_id}', [App\Http\Controllers\SurveyController::class, 'survey_input'])->name('survey.show');
