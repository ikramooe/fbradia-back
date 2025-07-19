<?php

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
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
})
->template(\App\Nova\Templates\Index::class)
->name('Index');

Route::get('/about', function () {
    return view('about');
})
->template(\App\Nova\Templates\About::class)
->name('about');

Route::get('/contact', function () {
    return view('contact');
})
->template(\App\Nova\Templates\Contact::class)
->name('contact');



