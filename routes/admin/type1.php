<?php

use App\Http\Controllers\Admin\type\Type1Controller;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/type1"],function(){
    Route::get("/",[Type1Controller::class, "list"]);
    Route::get("add",[Type1Controller::class, "add"]);
    Route::post("insert",[Type1Controller::class, "insert"]);
    Route::get("edit/{id}",[Type1Controller::class, "edit"]);
    Route::post("update",[Type1Controller::class, "update"]);
    Route::post("delete",[Type1Controller::class, "delete"]);
    Route::post("search",[Type1Controller::class, "search"]);
});