<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\UserContactController;

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



Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class,'profile'])->name('profile');
    Route::get('/pages', [DashboardController::class,'pages'])->name('pages');



    Route::name('user.')->prefix('user')->group(function () {

        Route::get('/create', [DashboardController::class,'createUser'])->name('create');
        Route::get('/edit/{id}', [DashboardController::class,'editUser'])->name('edit');
        Route::get('/users', [DashboardController::class,'usersPage'])->name('list');
      
        
    });
    Route::name('pages.setting.')->prefix('pages')->group(function () {

        Route::get('/about', [DashboardController::class,'aboutPage'])->name('about');
        Route::get('/portfolio', [DashboardController::class,'portfolioPage'])->name('portfolio');
       
        
    });

    // save settings

    Route::post('/info/setting', [SettingController::class,'saveInfoSettings'])->name('info.setting');
    Route::post('/portfolio/setting', [SettingController::class,'portfolioSettings'])->name('portfolio.setting');
    Route::post('/save/user', [SettingController::class,'saveUser'])->name('save.user');
});


// admin skill save route
Route::name('admin.skill.setting.')->prefix('portfolio/setting/about')->middleware('auth')->group(function () {

    Route::post('/save', [SettingController::class,'saveSkill'])->name('save');
    Route::get('/delete/{id}', [SettingController::class,'deleteSkill'])->name('delete');
    
});

// save user query from contact us page
Route::post('/contact-us', [UserContactController::class,'userQuery'])->name('user.query');


Route::get('/', function () {
    return view('layouts.portfolio');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

