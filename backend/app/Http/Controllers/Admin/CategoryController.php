<?php

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function create()
    {
        return response()->json(['create']);
    }

    public function update()
    {
        return response()->json(['update']);
    }

    public function desactive()
    {
        return response()->json(['desactive']);
    }
}
