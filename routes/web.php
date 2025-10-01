<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.homepage.index');
});
Route::get('/about-us', function () {
    return view('pages.aboutus.index');
});
Route::get('/services', function () {
    return view('pages.services.index');
});
Route::get('/membership', function () {
    return view('pages.membership.index');
});
