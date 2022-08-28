<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

//Rotas de usuarios para visualização, cadastro, edição e exclusão
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'create'])
    ->name('user.create')
    ->can('is_admin');
Route::post('/user/create', [UserController::class, 'store'])
    ->name('user.store')
    ->can('is_admin');