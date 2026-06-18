<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'About')->name('home');
Route::inertia('/resume', 'Resume')->name('resume');
Route::inertia('/portfolio', 'Portfolio')->name('portfolio');
Route::inertia('/contact', 'Contact')->name('contact');
