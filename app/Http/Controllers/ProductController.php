<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function AddProduct(Request $req){
        // error_log($req);
        // $product = new Product;
        // $product->name=$req->name;
        // $product->file_path=$req->file;
        // $product->description=$req->description;
        // $product->price=$req->price;
        // $product->save();
        // return $product;

        $product = Product::create([
            "name" => $req->name,
            "file_path" => $req->file_path,
            "description" => $req->description,
            "price" => $req->price,
        ]);       
        return response()->json(["status" => 200]);
    }

    // function list()
    // {
    //     return Product::all();
    // }
    // function delete($id)
    // {
    //     $result= Product::where('id',$id)->delete();
    //     if($result)
    //     {
    //         return ["result"=>"product has been delete"];
    //     }
    //     else{
    //         return ["result"=>"Operation failed"];
    //     }
    // }
    // function getProduct($id)
    // {
    //     return Product::find($id);
    // }

    // function updateProduct($id, Request $req)
    // {
    //     $product= Product::find($id);
    //     $product->name=$req->input('name');
    //     $product->price=$req->input('price');
    //     $product->description=$req->input('description');
    //     if($req->file('file'))
    //     {
    //         $product->file_path=$req->file('file')->store('products');

    //     }
    //     $product->save();
    //     return $product;
    // }
    // function search($key)
    // {
    //     return Product::where('name','Like',"%$key%")->get();
    // }
}
