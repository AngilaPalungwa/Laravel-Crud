<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\TryCatch;

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
        try {
            $image_url='';
            if($request->has('file') && $request->image('image')){
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
        } catch (\Exception $e) {
            session()->flash('error','Something Went wrong');
            return redirect()->back()->withInput();
        }

    }

    public function editProduct($id){
        if(!$id){
            session()->flash('error','something went wrong');
            return redirect()->back();
        }
       $product=Product::find($id);
       if($product){
        return view('productEdit',compact('product'));
       }

    }
    public function updateProduct(Request $request,$id){
        if(!$id){
            session()->flash('error','something went wrong');
            return redirect()->back();
        }
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        try {
            $image_url='';
            if($request->has('file') && $request->image('image')){
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

            $product=Product::find($id);
           if($product){
            $product->update($data);
            session()->flash('messsage','Record updated successfully');
            return redirect()->route('product.index');
           }
           return redirect()->route('product.index');

        } catch (\Exception $e) {
            session()->flash('error','Something Went wrong');
            return redirect()->back()->withInput();
        }

    }
    public function deleteProduct($id){
        if(!$id){
            session()->flash('error','something went wrong');
            return redirect()->back();
        }
       $product=Product::find($id);
       if($product){
        $product->delete();
        session()->flash('message','Record Deleted Successfully');
        return redirect()->back();
       }
       session()->flash('message','Something went wrong');
       return redirect()->back()->withInput();

    }


}
