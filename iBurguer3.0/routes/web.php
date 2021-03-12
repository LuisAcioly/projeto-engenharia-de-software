<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::view('profile', 'profile')->name('profile');
    
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');
    
    Route::resource('task',\App\Http\Controllers\TaskController::class);

    Route::view('task' , [\App\Http\Controllers\ProfileController::class, 'create'])->name('task.create');

    Route::post('task/store', [\App\Http\Controllers\TaskController::class, 'store'])->name('task.store');

    Route::view('admin', [\App\Http\Controllers\UserController::class, 'index'])->name('show.index');

    Route::view('admin', [\App\Http\Controllers\UserController::class, 'link'])->name('show.link');

    Route::get('/task/{id}', [\App\Http\Controllers\TaskController::class, 'show'])->name('show.task');

    Route::post('task', [\App\Http\Controllers\TaskController::class, 'edit'])->name('edit.task');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


