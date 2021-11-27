<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(Request $request){
        if( !$paginate = $request->get("no_paginate")) return response()->json(Category::get(),201);
        return response()->json(Category::paginate() , 201);
    }
}
