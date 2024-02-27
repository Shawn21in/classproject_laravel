<?php

use App\Http\Controllers\Admin\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/shop"],function(){
    Route::get("/",[ShopController::class, "list"]);
    Route::get("add",[ShopController::class, "add"]);
    Route::post("insert",[ShopController::class, "insert"]);
    Route::get("edit/{id}",[ShopController::class, "edit"]);
    Route::post("update",[ShopController::class, "update"]);
    Route::post("delete",[ShopController::class, "delete"]);
    Route::post("check",[ShopController::class, "check"]);

});



?>