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

Route::get('about/{a}/{b}', "HomepageController@about");

Route::get('/product', function () {
    return view('content.product');
});

Route::get('/industry', function () {
    return view('content.industry');
});

Route::get('/case-studies',  "HomepageController@gallery");
Route::get('/detail-gallery/{id}', "HomepageController@detailGallery");
Route::post('/contact-us','HomepageController@contactUs');


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
    Route::get("/contents/edit/{id}", "ContentsController@edit");
    Route::post("/contents/update/{id}", "ContentsController@update");
    Route::get("/contents/delete/{id}", "ContentsController@destroy");
    Route::get("/contents/delete/gallery/{id}", "ContentsController@destroyGallery");

    Route::get("/banner", "BannerController@index");
    Route::get("/banner/all", "BannerController@all");
    Route::get("/banner/add", "BannerController@create");
    Route::post("/banner/add", "BannerController@store");
    Route::get("/banner/edit/{id}", "BannerController@edit");
    Route::post("/banner/update/{id}", "BannerController@update");
    Route::get("/banner/delete/{id}", "BannerController@destroy");

    Route::get("/galleries", "GalleriesController@index");
    Route::get("/galleries/all", "GalleriesController@all");
    Route::get("/galleries/add", "GalleriesController@create")->name("galleries.add");
    Route::post("/galleries/add", "GalleriesController@store");
    Route::get("/galleries/edit/{id}", "GalleriesController@edit");
    Route::post("/galleries/update/{id}", "GalleriesController@update");
    Route::get("/galleries/delete/{id}", "GalleriesController@destroy");

    Route::get("/profile", "ProfileController@index");
    Route::get("/profile/edit", "ProfileController@edit");
    Route::post("/profile/update", "ProfileController@update");

    Route::get("/about/edit", "AboutController@edit");
    Route::post("/about/update", "AboutController@update");

    Route::get("emails/all", "EmailController@getAllEmails")->name("email.data");
    Route::get("/emails", "EmailController@index");

});

