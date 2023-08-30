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

    public function valid(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $valid = true;
        return $valid;
        
    }

    public function store(Request $request){

       $check = $this->valid($request);

       if($check){

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
        else{
            echo 'nem megfelelő adatok';
        }
    }

    public function destroy($id){

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/')->with('mssg','Product has been deleted!');
    }

    public function showData($id) {

        $data = Product::findOrFail($id);
        

        return view('edit', ['data' => $data]);
        
    }

    public function update (Request $request){

        $check = $this->valid($request);

       if($check){

        $path = $request->file('photo')->store('public/img');
        $url = Storage::url($path);

        $data=Product::find($request->id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->categories_id = $request->category;
        $data->photo = $url;
        $data->save();

        return redirect('/')->with('mssg','Product has been updated!');
       }

    }

}
