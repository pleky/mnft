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

Route::get('/', 'HomepageController@index');

Route::get('content/{a}/{b}', 'HomepageController@content');

Route::get('/about', function () {
    return view('content.about');
});

Route::get('/product', function () {
    return view('content.product');
});

Route::get('/industry', function () {
    return view('content.industry');
});

Route::get('/gallery',  "HomepageController@gallery");

Route::get("/mensolutions/{menu}", "SolutionController@pages");
Route::post("/emailpost", "SolutionController@saveEmail");

//===========ADMIN===========
Route::get('/login', function () {
    return view('admin.login');
});
Route::post("/loginpost", "AdminController@loginPost");
Route::get("/admin/generate", "AdminController@generatePassword");

Route::group(['middleware' => 'cekstatuslogin'], function()
{
    Route::get("/admin", "AdminController@index");
    Route::get("/logout", "AdminController@logout");

    Route::get("/menu", "MenuController@index");
    Route::get("/menu/add", "MenuController@create")->name("menu.add");
    Route::post("/menu/add", "MenuController@store");
    Route::get("/menu/all", "MenuController@all");
    Route::get("/menu/edit/{id}", "MenuController@edit");
    Route::post("/menu/update/{id}", "MenuController@update");
    Route::get("/menu/delete/{id}", "MenuController@destroy");

    Route::get("/contents", "ContentsController@index");
    Route::get("/contents/all", "ContentsController@all");
    Route::get("/contents/add", "ContentsController@create")->name("contents.add");
    Route::post("/contents/add", "ContentsController@store");

    Route::get("/banner", "BannerController@index");
    Route::get("/banner/all", "BannerController@all");
    Route::get("/banner/add", "BannerController@create");
    Route::post("/banner/add", "BannerController@store");
    Route::get("/banner/edit/{id}", "BannerController@edit");

    Route::get("/profile", "ProfileController@index");
    Route::get("/profile/edit", "ProfileController@edit");
    Route::post("/profile/update", "ProfileController@update");

    Route::get("solutions/all", "SolutionController@getAllSolutions")->name("menu.data");
    Route::get("/solutions", "SolutionController@index");
    Route::get("/solutions/edit/{id}", "SolutionController@edit");
    Route::post("/solutions/update/{id}", "SolutionController@update");

    Route::get("emails/all", "EmailController@getAllEmails")->name("email.data");
    Route::get("/emails", "EmailController@index");

});

