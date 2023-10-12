<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\feedback\FeedbackController;

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

Route::get('/lout', [HomeController::class, 'lout'])->name('lout');

Route::get('/clearcache', function () {
    Artisan::call('optimize:clear');

    return 'Application cache has been cleared';
});

Route::get('/configcache', function () {
    Artisan::call('config:cache');

    return 'Application cache configed';
});

Route::get('/routecache', function () {
    Artisan::call('route:cache');

    return 'Application route configed';
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

    //Tasks
    Route::get('/tasks_index', [TaskController::class, 'index'])->name('tasks_index');
    Route::post('/task_store', [TaskController::class, 'store'])->name('task_store');
    Route::get('/task_get', [TaskController::class, 'Get_tasks_Data'])->name('task_get');
    Route::get('/getGroup', [TaskController::class, 'getGroupPeople'])->name('getGroup');

});
