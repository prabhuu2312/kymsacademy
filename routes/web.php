<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::view('/cat-pyqs', 'cat-pyqs');
Route::view('/quantitative-notes', 'quantitative-notes');
Route::view('/verbal-reading-materials', 'verbal-reading-materials');

Route::view('/course-details', 'course-details');

Route::view('/school-list', 'school-list');
Route::view('/news', 'news');
Route::view('/contact-us', 'contact-us');
