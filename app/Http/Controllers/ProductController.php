<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;

class ProductController extends Controller
{
    public function form(){
        return view('productForm');
    }
    public function index(){
        $products=Product::all();
        return view('productTable',compact('products'));
    }
    public function handleProduct(Request $request){
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        $image_url='';
        if($request->has('file') && $request->image('file')){
            $file=$request->image();
            $fileName=time().'-'.rand(10,99999).'-'.$file->getClientOriginalname();
            $path=public_path().'profiles'.'/';
            $file->move($path,$fileName);
            $image_url=asset('profiles'/$fileName);

        }
        $data=[
            'name'=>$request->name,
            'category'=>$request->category,
            'price'=>$request->price,
            'status'=>$request->status,
            'image'=>$image_url,
        ];

        $product=Product::create($data);
        session()->flash('message','Record Added Successfully');
        return redirect()->route('product.index');
    }



}
