<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Shop\ShopController;
use App\Http\Controllers\Admin\test\TestController;
use App\Http\Controllers\Admin\type\Type1Controller;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function(){
    Route::get("/",[AdminController::class, "login"]);
    Route::post("doLogin",[AdminController::class, "doLogin"]);
    Route::get("home",[AdminController::class, "home"])->middleware("manager");

});

Route::group(["middleware" => "manager","prefix" => "admin/type1"],function(){
    Route::get("/",[Type1Controller::class, "list"]);
    Route::get("add",[Type1Controller::class, "add"]);
    Route::post("insert",[Type1Controller::class, "insert"]);
    Route::get("edit/{id}",[Type1Controller::class, "edit"]);
    Route::post("update",[Type1Controller::class, "update"]);
    Route::post("delete",[Type1Controller::class, "delete"]);
    Route::post("search",[Type1Controller::class, "search"]);
});

Route::group(["middleware" => "manager","prefix" => "admin/shop"],function(){
    Route::get("/",[ShopController::class, "list"]);
    Route::get("add",[ShopController::class, "add"]);
    Route::post("insert",[ShopController::class, "insert"]);
    Route::get("edit/{id}",[ShopController::class, "edit"]);
    Route::post("update",[ShopController::class, "update"]);
    Route::post("delete",[ShopController::class, "delete"]);
    Route::post("check",[ShopController::class, "check"]);

});

Route::group(["middleware" => "manager","prefix" => "admin/product"],function(){
    Route::get("/",[ProductController::class, "list"]);
    Route::get("add",[ProductController::class, "add"]);
    Route::post("insert",[ProductController::class, "insert"]);
    Route::get("edit/{id}",[ProductController::class, "edit"]);
    Route::post("update",[ProductController::class, "update"]);
    Route::post("delete",[ProductController::class, "delete"]);
    Route::post("check",[ProductController::class, "check"]);

});

Route::group(["middleware" => "manager","prefix" => "admin/test"],function(){
    Route::get("/",[TestController::class, "list"]);
});