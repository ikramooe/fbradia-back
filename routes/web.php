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

Route::get('/home', function () {
    return view('index');
})
->template(\App\Nova\Templates\Index::class)
->name('Index');


Route::get('/about', function () {
    return view('about');
})
->template(\App\Nova\Templates\About::class)
->name('about');


Route::get('/blog', function () {
    return view('blog');
})
->name('blog');

Route::get('/blog/{blog}', function ($blog) {
    $article = App\Models\Blog::where('title->fr', $blog)->first();
    dd($article);
    return view('blog', compact('article'));
})
->name('blog');

Route::get('/blog/{blog}', function ($blog) {
    return view('article', compact('blog'));
})
->name('blog_single');

Route::get('/contact', function () {
    return view('contact');
})
->template(\App\Nova\Templates\Contact::class)
->name('contact');

Route::get('locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('locale');

Route::get('/pages/{page}', function ($p) {

    
    $page = App\Models\Page::where('title->fr', $p)->first();
    
    if($page->model_type == 'model1') {
        return view('modele1', compact('page'));
    }
    if($page->model_type == 'model2') {
        return view('modele2', compact('page'));
    }
    return view('page', compact('page'));
})
->name('page');




