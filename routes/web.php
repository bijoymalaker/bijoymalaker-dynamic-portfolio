<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [FrontendController::class, 'about'])->name('home');
Route::get('/resume', [FrontendController::class, 'resume'])->name('resume');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    
    Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::post('/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
    Route::post('/projects/{project}', [AdminController::class, 'updateProject'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');

    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::post('/services/{service}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/services/{service}', [AdminController::class, 'destroyService'])->name('admin.services.destroy');

    Route::get('/education', [AdminController::class, 'education'])->name('admin.education');
    Route::post('/education', [AdminController::class, 'storeEducation'])->name('admin.education.store');
    Route::put('/education/{education}', [AdminController::class, 'updateEducation'])->name('admin.education.update');
    Route::delete('/education/{education}', [AdminController::class, 'destroyEducation'])->name('admin.education.destroy');

    Route::get('/experience', [AdminController::class, 'experience'])->name('admin.experience');
    Route::post('/experience', [AdminController::class, 'storeExperience'])->name('admin.experience.store');
    Route::put('/experience/{experience}', [AdminController::class, 'updateExperience'])->name('admin.experience.update');
    Route::delete('/experience/{experience}', [AdminController::class, 'destroyExperience'])->name('admin.experience.destroy');

    Route::get('/skills', [AdminController::class, 'skills'])->name('admin.skills');
    Route::post('/skills', [AdminController::class, 'storeSkill'])->name('admin.skills.store');
    Route::put('/skills/{skill}', [AdminController::class, 'updateSkill'])->name('admin.skills.update');
    Route::delete('/skills/{skill}', [AdminController::class, 'destroySkill'])->name('admin.skills.destroy');

    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::delete('/messages/{message}', [AdminController::class, 'destroyMessage'])->name('admin.messages.destroy');
});
