<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin.php';

Route::view('/', 'index');

Route::view('/cat-pyqs', 'cat-pyqs');
Route::view('/quantitative-notes', 'quantitative-notes');
Route::view('/verbal-reading-materials', 'verbal-reading-materials');

Route::view('/course-details', 'course-details');

Route::view('/school-list', 'school-list');
Route::view('/news', 'news');
Route::view('/contact-us', 'contact-us');


Route::view('/cat-pyqs-details', 'cat-pyqs-details');

Route::view('/cat-pyqs-explaination', 'cat-pyqs-explaination');
