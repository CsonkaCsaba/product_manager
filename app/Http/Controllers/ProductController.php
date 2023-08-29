<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProductController extends Controller
{
    public function index(){
     
    $products = Product::all();

    $category = Categories::with('Product')->get();


    return view('welcome', [
        'products' => $products,
        'category' => $category
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = $request->file('photo')->store('public/img');
        $url = Storage::url($path);

        $product = new Product();
        $product->name = request('name'); 
        $product->description = request('description');
        $product->categories_id = request('category');
        $product->photo = $url;
        $product->save(); 

        return redirect('/')->with('mssg','Product has been saved!'); 
    }

    public function destroy($id){

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/')->with('mssg','Product has been deleted!');
    }

    public function showData($id) {

        $data = Product::findOrFail($id);
        $selectedCat = Product::first()->role_id;

        return view('edit', ['data' => $data]);
        
    }

    public function update (Request $req){

        $data=Product::find($req->id);
        $data->name = $req->name;
        $data->description = $req->description;
        $data->categories_id = $req->categories_id;
        $data->save();

        return redirect('/')->with('mssg','Product has been updated!');

    }

}
