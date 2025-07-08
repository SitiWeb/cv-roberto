<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PersonaliaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/getPersonalia/{id}', [FrontendController::class, 'getPersonalia'])->name('personalia');
Route::post('/contact', [FrontendController::class, 'message'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('work-experiences', \App\Http\Controllers\WorkExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('personalia', PersonaliaController::class);
    Route::resource('educations', EducationController::class);

});

require __DIR__.'/auth.php';
