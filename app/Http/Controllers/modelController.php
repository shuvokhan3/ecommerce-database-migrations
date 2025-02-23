<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class modelController extends Controller
{
    public function createBrand(Request $request){
        return brand::create($request->input());
    }
}
