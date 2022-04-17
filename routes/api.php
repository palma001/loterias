<?php

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

Route::get('{ticket}/ticketText', ['uses' => 'ApiController@getTicketText', 'as' => 'api.ticketText']);
Route::get('{printCode}/printSpooler', ['uses' => 'ApiController@getPrintSpooler', 'as' => 'api.printSpooler']);

Route::group([
    'prefix' => 'authentication',
], function ($router) {
    // Routes
    $router->post('/login', 'Login\Login@authentication');
    $router->post('/refresh-token', 'Login\RefreshToken@refreshToken');
});
