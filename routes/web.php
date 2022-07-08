<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSkillController;
use Illuminate\Foundation\Application;
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
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard Skills
    Route::post('/dashboard/skills', [UserSkillController::class, 'store'])->name('user.skill.store');
    Route::patch('/dashboard/skill/{skill}', [UserSkillController::class, 'update'])->name('user.skill.update');
    Route::delete('/dashboard/skill/{skill}', [UserSkillController::class, 'destroy'])->name('user.skill.destroy');
});
