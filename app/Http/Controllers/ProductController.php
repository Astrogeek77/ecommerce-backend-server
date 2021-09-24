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
            "category" => $req->category,
            "description" => $req->description,
            "price" => $req->price,
        ]); 
        error_log("_____________________");
        error_log($req->category);   
        error_log("_____________________");
        // error_log($product);
        return response()->json(["Post Created Successfully!"]);
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
            return response()->json(["Product has been Successfully Deleted!"]);
        }
        else{
            return response()->json(["Operation failed!"]);
        }
    }

    function ShowProduct($id)
    {
        $result = Product::find($id);
        if($result){
            return $result;
        } else {
            return response()->json(["No Such Product"]);
        }
    }

    function UpdateProduct($id, Request $req)
    {
        // error_log("UPDATE");
        // error_log($req);
        // error_log("++++++++++++++++++++++++++");
        $product= Product::find($id);
        $product->name=$req->input('name');
        $product->price=$req->input('price');
        $product->category=$req->category;
        $product->description=$req->input('description');
        $product->file_path=$req->input('file_path');

        if( $product->save()){
            return response()->json(["Product Successfully Updated!"]);
        }
    }
    
    function SearchProduct($query)
    {
        // return Product::where([
        //     ["name",'Like',"%$query%"],
        //     // ["category",'Like',"%$query%"],
        // ])->get();
        return Product::where("name",'Like',"%$query%")
                        ->orWhere("category",'Like',"%$query%")
                        ->orWhere('id', "=", "$query%")
                        // ->orWhere('description', 'like', "%$query%")
                        // ->orWhere("price",'<=',"$query")
                        ->get();
    }
}
