<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::apiResource('/video','VideoController');
Route::apiResource('/document','DocumentController');
Route::apiResource('/galerie','GalerieController');
Route::apiResource('/lien-extern','LienExternController');
Route::apiResource('/reseaux-sociaux','ReseauxSociauxController');
Route::apiResource('/stand','StandController');
Route::apiResource('/temoignage','TemoignageController');
Route::apiResource('/theme','ThemeController');
Route::apiResource('/evenement','EvenementController');
Route::apiResource('/espace','EspaceExpositionController'); */

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');
Route::apiResource('/mail','SendEmailController');


// Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::get('checkuser', 'ApiController@usierIsLogin');
    /*  Route::get('user/{id}', 'ApiController@getUserById'); */
    Route::post('img/{id}', 'GalerieController@img');
    Route::get('user', 'ApiController@me');
    Route::apiResource('/video','VideoController');
    Route::apiResource('/document','DocumentController');
    Route::apiResource('/galerie','GalerieController');
    Route::apiResource('/lien-extern','LienExternController');
    Route::apiResource('/reseaux-sociaux','ReseauxSociauxController');
    Route::apiResource('/stand','StandController');
    Route::apiResource('/temoignage','TemoignageController');
    Route::apiResource('/theme','ThemeController');
    Route::apiResource('/evenement','EvenementController');
    Route::apiResource('/espace','EspaceExpositionController');

// });
