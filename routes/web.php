<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\RSSFeedController;


Route::get('/', function(){return view('landing.index');})->name('home');
Route::get('/about-us', function(){return view('landing.aboutUs');})->name('about');
Route::get('/contact', function(){return view('landing.contact');})->name('contact');
Route::get('/articles',[Controller::class, 'homeArticles'])->name('releases');
Route::get('/home/article/{id}', [Controller::class, 'homeArticlePage'])->name('articleHome');
Route::get('/admin', function(){
    // check if already logged in
    if(Session::has('user_id')){
        return redirect()->route('dashboard');
    }
    return view('landing.signin');
})->name('admin');
Route::post('/login', [Controller::class, 'login'])->name('login');

Route::middleware('checkLogin')->group(function () {
    Route::get('/home', function(){return view('pages.main');})->name('dashboard');
    Route::get('/site-details/{id}',  [WebsiteController::class, 'site_details'])->name('site.details');

    Route::get('/websites', [WebsiteController::class, 'index'])->name('websites');
    Route::post('/sites/store', [WebsiteController::class, 'store'])->name('sites.store');
    Route::post('/sites/edit', [WebsiteController::class, 'edit'])->name('sites.edit');
    Route::delete('/sites/{id}', [WebsiteController::class, 'destroy'])->name('sites.destroy');
    Route::get('/sites/new', [WebsiteController::class, 'new'])->name('sites.new');
    Route::get('/sites/edit/{id}', [WebsiteController::class, 'getEdit'])->name('sites.getEdit');
    
    Route::get('/headers', [HeaderController::class, 'index'])->name('headers');
    Route::post('/headers/update/{header_id}', [HeaderController::class, 'update'])->name('headers.update');
    Route::post('/headers/store', [HeaderController::class, 'store'])->name('headers.store');
    Route::get('/headers/add', [HeaderController::class, 'add'])->name('headers.add');
    Route::get('/headers/edit/{id}', [HeaderController::class, 'getEdit'])->name('headers.getEdit');
    Route::delete('/headers', [HeaderController::class, 'destroy'])->name('headers.destroy');
    
    
    Route::get('/data', [Controller::class, 'index'])->name('data');
    Route::get('/article/{id}', [Controller::class, 'articlePage'])->name('article');

    Route::get('/user', [Controller::class, 'userProfile'])->name('user');
    Route::post('/update', [Controller::class, 'updateProfile'])->name('update-profile');
    Route::post('/logout', [Controller::class, 'logout'])->name('logout');
});
Route::get('/rss-feed/{website}', [RSSFeedController::class, 'generateRSS'])->name('rss.feed');
Route::get('/data-feed/{website}', [RSSFeedController::class, 'dataRSS'])->name('rss.data_feed');
Route::get('/return-feed', [RSSFeedController::class, 'returningRss'])->name('rss.return_feed');
Route::get('/sites/logo/{id}', [WebsiteController::class, 'getLogo']);