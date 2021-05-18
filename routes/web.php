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

Route::get('/', function () {
    return view('content.homepage');
});

Route::get('/about', function () {
    return view('content.about');
});
Route::get('/product', function () {
    return view('content.product');
});

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

    Route::get("solutions/all", "SolutionController@getAllSolutions")->name("menu.data");
    Route::get("/solutions", "SolutionController@index");
    Route::get("/solutions/edit/{id}", "SolutionController@edit");
    Route::post("/solutions/update/{id}", "SolutionController@update");

    Route::get("emails/all", "EmailController@getAllEmails")->name("email.data");
    Route::get("/emails", "EmailController@index");
});

