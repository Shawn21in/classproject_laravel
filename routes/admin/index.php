<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
require __DIR__."/banner.php";
require __DIR__."/type1.php";
require __DIR__."/product.php";
require __DIR__."/shop.php";
require __DIR__."/photo.php";
require __DIR__."/spec.php";
require __DIR__."/productShop.php";


Route::group(["prefix" => "admin"], function(){
    Route::get("/",[AdminController::class, "login"]);
    Route::post("doLogin",[AdminController::class, "doLogin"]);
    Route::get("home",[AdminController::class, "home"])->middleware("manager");

});


?>
