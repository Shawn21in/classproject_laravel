<?php

use App\Http\Controllers\Admin\Product\SpecController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/spec"],function(){
    
    Route::get("add/{product_id}",[SpecController::class, "add"]);
    Route::post("insert",[SpecController::class, "insert"]);
    Route::get("edit/{product_id}/{id}",[SpecController::class, "edit"]);
    Route::post("update",[SpecController::class, "update"]);
    Route::post("delete",[SpecController::class, "delete"]);
 

});

?>