<?php

use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/product"],function(){
    Route::get("/",[ProductController::class, "list"]);
    Route::get("add",[ProductController::class, "add"]);
    Route::post("insert",[ProductController::class, "insert"]);
    Route::get("edit/{id}",[ProductController::class, "edit"]);
    Route::post("update",[ProductController::class, "update"]);
    Route::post("delete",[ProductController::class, "delete"]);
    Route::post("check",[ProductController::class, "check"]);

});

?>