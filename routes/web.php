<?php

use App\Http\Controllers\feedback\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/verification', [HomeController::class, 'indexUserVerification'])->name('index.verify');
    Route::get('/getuser', [HomeController::class, 'Get_User_Data'])->name('getuser');
    Route::get('/user_status_update', [HomeController::class, 'Status_Update'])->name('user_status_update');

    // Parties
    Route::get('/parteis_index', [PartyController::class, 'index'])->name('parteis_index');
    Route::get('/getdistricts', [PartyController::class, 'getdistricts'])->name('getdistricts');
    Route::get('/getCity', [PartyController::class, 'getCity'])->name('getCity');
    Route::post('/partysave', [PartyController::class, 'store'])->name('party-store');
    Route::get('/Get_party_Data', [PartyController::class, 'Get_party_Data'])->name('Get_party_Data');

    // feedback
    Route::get('/feedback_index', [FeedbackController::class, 'index'])->name('feedback_index');
    Route::post('/feedback_store', [FeedbackController::class, 'store'])->name('feedback_store');
    Route::get('/feedback_ddc', [FeedbackController::class, 'getDivisionDistrictCity'])->name('feedback_ddc');
    Route::get('/feedback_get', [FeedbackController::class, 'Get_feedback_Data'])->name('feedback_get');

});
