<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DepartmentController as ControllersDepartmentController;
use App\Models\Department;
use App\Models\Info;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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
    $clientcount = User::count();
    $mentorcount = User::count();
    $departmentcount = Department::count();
    $newscount = Info::count();

    return view('index', [
        'clientcount' => $clientcount,
        'mentorcount' => $mentorcount,
        'departmentcount' => $departmentcount,
        'newscount' => $newscount,
        'user' => User::all()
    ]);
})->middleware(['auth', 'verified'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');


Route::get('adults/index', function () {
    return view('adults/index', [
        'adults/index' => User::all()
    ]);
})->name('adults');

Route::get('/clients', function () {
    return view('clients', [
        'clients' => User::all()
    ]);
})->name('clients');

// Route::resource('clients', UserController::class);
// Route::resource('mentors', UserController::class);
Route::resource('departments', ControllersDepartmentController::class);
// Route::resource('adults', DepartmentController::class);
// Route::resource('teens', DepartmentController::class);
// Route::resource('news', DepartmentController::class);
// Route::resource('mails', DepartmentController::class);
// Route::resource('mails', DepartmentController::class);

Route::get('/mails', function () {
    return view('mails', [
        'mails' => User::all()
    ]);
})->name('mails');

Route::get('/mentors', function () {
    return view('mentors', [
        'mentors' => User::all()
    ]);
})->name('mentors');

Route::get('/news', function () {
    return view('news', [
        'news' => User::all()
    ]);
})->name('news');

Route::get('/surveys', function () {
    return view('surveys', [
        'surveys' => User::all()
    ]);
})->name('surveys');

Route::get('/teens', function () {
    return view('teens', [
        'teens' => User::all()
    ]);
})->name('teens');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';







