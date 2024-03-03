<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ProductForm(){
return view('admin.uploadProduct');
    }
    public function addProduct(Request $request){
        $request->validate(['title' => 'required','desc' => 'required','price' => 'required','quantity' => 'required','img' => 'required']);
        $cat = Category::where('name', $request->title)->get();
        $file = $request->file('img');
        $imgName = $file -> getClientOriginalName();
        $folder = $file-> move(public_path().'/admin/assets/images/product-img',$imgName);
        foreach($cat as $value){
        $product= Product::create(['category_id' => $value->id,'title' => $request->title,'desc' => $request->desc,'price' => $request->price,'quantity' => $request->quantity,'img' =>$folder]);
    }
        return redirect()->back()->with('message','product add');
    }

}
