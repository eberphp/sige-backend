<?php

use App\Http\Controllers\Website\WebController;
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

/* Route::get('/', [WebController::class, 'index'])->name('/');
 */

Route::group(['prefix' => 'website',  'middleware' => 'CORS'], function () {
    Route::controller(WebController::class)->group(function () {
        Route::get('index', 'index');
    });
});
