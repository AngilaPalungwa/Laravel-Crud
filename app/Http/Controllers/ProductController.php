<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function handleProduct(Request $request){
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
    }
}
