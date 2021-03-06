<?php

use App\Http\Controllers\MessageController;
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

Route::resource("messages", MessageController::class);


Route::get("/{url}", function () {
    return redirect("messages");
})->middleware(["auth"])->where("url", "dashboard|");


require __DIR__ . "/auth.php";
