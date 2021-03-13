<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\BurguerController;

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

    Route::get('/menu', [BurguerController::class, 'index'])->name('menu');

    Route::get('/menu/register', [BurguerController::class, 'create'])->name('burguer.add');

    Route::post('menu/store', [\App\Http\Controllers\BurguerController::class, 'store'])->name('burguer.store');

    Route::get('menu/{id}', [\App\Http\Controllers\BurguerController::class, 'show'])->name('burguer.show');

    Route::post('menu/edit', [\App\Http\Controllers\BurguerController::class, 'edit'])->name('burguer.edit');

    Route::get('delete/{id}', [\App\Http\Controllers\BurguerController::class, 'delete'])->name('burguer.delete');

    Route::get('drink', [\App\Http\Controllers\DrinkController::class, 'show'])->name('drink.show');

    Route::post('drink/store', [\App\Http\Controllers\DrinkController::class, 'store'])->name('drink.store');

    Route::get('drink/{id}', [\App\Http\Controllers\DrinkController::class, 'delete'])->name('drink.delete');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




