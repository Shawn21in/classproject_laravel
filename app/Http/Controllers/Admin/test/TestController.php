<?php

namespace App\Http\Controllers\Admin\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller

{
    public function list(){
        
        return view("admin.test.test");
    }

    public function add(){
        // $list = DB::
        // DB::select(原本的語法);
    }

    
}

