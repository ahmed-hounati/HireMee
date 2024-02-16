<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\candidateurController;
use App\Http\Controllers\cvController;
use App\Http\Controllers\emploiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsletterController;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [homeController::class, 'index'])->name('home');

Route::get('/user', [userController::class, 'index'])->middleware('user');
Route::get('/admin', [adminController::class, 'index'])->middleware('admin');
Route::get('/entreprise', [emploiController::class, 'index'])->middleware('entreprise');

Route::get('/user_register', [RegisteredUserController::class, 'create'])->name('auth.user_register');

Route::get('/entreprise_register', [RegisteredUserController::class, 'createEntreprise'])->name('auth.entreprise_register');
Route::post('/entreprise_register', [RegisteredUserController::class, 'store'])->name('auth.entreprise_register');



Route::get('/entreprise/emplois/all', [emploiController::class, 'index'])->middleware('entreprise')->name('entreprise.emplois.all');
Route::get('/entreprise/emplois/create', [emploiController::class, 'create'])->middleware('entreprise')->name('entreprise.emplois.create');
Route::post('/entreprise/emplois/create', [emploiController::class, 'store'])->middleware('entreprise')->name('entreprise.emplois.creat');
Route::get('/entreprise/emplois/{emploi}/edit', [emploiController::class, 'edit'])->middleware('entreprise')->name('entreprise.emplois.edit');
Route::patch('/entreprise/emplois/{emploi}', [emploiController::class, 'update'])->middleware('entreprise')->name('entreprise.emploisupdate');
Route::delete('/entreprise/emplois/{emploi}', [emploiController::class, 'destroy'])->middleware('entreprise')->name('entreprise.emplois.delete');
Route::get('entreprise/emplois/allApplication/{emploi}', [emploiController::class, 'seeApplications'])->middleware('entreprise')->name('entreprise.emplois.allApplications');



Route::get('/cv', [cvController::class, 'create'])->middleware('user')->name('user.cv');
Route::post('/cv', [cvController::class, 'store'])->middleware('user')->name('user.cv');
Route::get('/show', [cvController::class, 'show'])->middleware('user')->name('user.show');
Route::get('/download', [cvController::class, 'download'])->middleware('user')->name('user.download');
Route::get('/emplois', [emploiController::class, 'jobs'])->middleware('user')->name('user.emplois');
Route::post('/postuler/{emploi}', [candidateurController::class, 'store'])->middleware('user')->name('user.postuler');
Route::get('/user/entreprises', [userController::class, 'getAllEntreprises'])->middleware('user')->name('user.entreprises');
Route::get('/entreprise/search', [userController::class, 'search'])->middleware('user')->name('user.entreprise');
Route::post('/subscribe', [newsletterController::class, 'subscribe'])->middleware('user')->name('subscribe');
Route::get('/entreprise/{entreprise}', [userController::class, 'entreprise'])->middleware('user')->name('user.oneEntreprise');



Route::get('/home', [userController::class, 'statistics'])->middleware('admin')->name('admin.dashboard');
Route::get('/entreprises', [userController::class, 'allEntreprises'])->middleware('admin')->name('admin.entreprises');
Route::get('/users', [userController::class, 'allUsers'])->middleware('admin')->name('admin.users');
Route::post('/archive/{user}', [userController::class, 'archive'])->middleware('admin')->name('admin.users.archive');
Route::post('/archive/{entreprise}', [userController::class, 'archive'])->middleware('admin')->name('admin.entreprises.archive');
require __DIR__.'/auth.php';
