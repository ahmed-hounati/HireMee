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



Route::get('/entreprise/emplois/all', [emploiController::class, 'index'])->name('entreprise.emplois.all');
Route::get('/entreprise/emplois/create', [emploiController::class, 'create'])->name('entreprise.emplois.create');
Route::post('/entreprise/emplois/create', [emploiController::class, 'store'])->name('entreprise.emplois.creat');
Route::get('/entreprise/emplois/{emploi}/edit', [emploiController::class, 'edit'])->name('entreprise.emplois.edit');
Route::patch('/entreprise/emplois/{emploi}', [emploiController::class, 'update'])->name('entreprise.emploisupdate');
Route::delete('/entreprise/emplois/{emploi}', [emploiController::class, 'destroy'])->name('entreprise.emplois.delete');

Route::get('/cv', [cvController::class, 'create'])->name('user.cv');
Route::post('/cv', [cvController::class, 'store'])->name('user.cv');
Route::get('/show', [cvController::class, 'show'])->name('user.show');
Route::get('/download', [cvController::class, 'download'])->name('user.download');

Route::get('/emplois', [emploiController::class, 'jobs'])->name('user.emplois');

Route::post('/postuler/{emploi}', [candidateurController::class, 'store'])->name('user.postuler');

Route::get('entreprise/emplois/allApplication/{emploi}', [emploiController::class, 'seeApplications'])->name('entreprise.emplois.allApplications');

Route::get('/emplois/search', [emploiController::class, 'search'])->name('emplois.search');

Route::get('/entreprises', [userController::class, 'getAllEntreprises'])->name('user.entreprises');

Route::get('/entreprise/search', [userController::class, 'search'])->name('user.entreprise');

Route::post('/subscribe', [newsletterController::class, 'subscribe'])->name('subscribe');
Route::get('/entreprise/{entreprise}', [userController::class, 'entreprise'])->name('user.oneEntreprise');

Route::get('/home', [userController::class, 'statistics'])->name('admin.dashboard');
Route::get('/entreprises', [userController::class, 'allEntreprises'])->name('admin.entreprises');
Route::get('/users', [userController::class, 'allUsers'])->name('admin.users');
Route::post('/archive/{user}', [userController::class, 'archive'])->name('admin.users.archive');
Route::post('/archive/{entreprise}', [userController::class, 'archive'])->name('admin.entreprises.archive');
require __DIR__.'/auth.php';
