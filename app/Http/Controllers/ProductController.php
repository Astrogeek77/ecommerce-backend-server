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

    function ShowList()
    {
        return Product::all();
    }
    
    function DeleteProduct($id)
    {
        $result= Product::where('id',$id)->delete();
        if($result)
        {
            return ["result"=>"product has been Successfully deleted"];
        }
        else{
            return ["result"=>"Operation failed"];
        }
    }

    function ShowProduct($id)
    {
        $result = Product::find($id);
        if($result){
            return $result;
        } else {
            return ["error"=>"no such product"];
        }
    }

    function UpdateProduct($id, Request $req)
    {
        $product= Product::find($id);
        $product->name=$req->input('name');
        $product->price=$req->input('price');
        $product->description=$req->input('description');
        $product->file_path=$req->input('file_path');
        $product->save();
        return $product;
    }
    
    // function search($key)
    // {
    //     return Product::where('name','Like',"%$key%")->get();
    // }
}
