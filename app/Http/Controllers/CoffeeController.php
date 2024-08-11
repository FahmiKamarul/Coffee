<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CoffeeController extends Controller
{   
    public function ordermanage(){
        $orders= Order::all();
        return view('orderManagement',compact('orders'));
    }

    public function showID($productID){
        $product = Product::find($productID);
        $products = Product::all();
        return view('outputAll', ['prod' => $product, 'products' => $products]);
    }

    public function show(){
        $products = Product::all();
        return view('outputAll', compact('products'));
    }

    public function create(){
        $products = Product::all();
        return view('upload', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'dairyFree' => 'required|in:YES,NO',
            'active' => 'required|in:YES,NO',
            'description' => 'nullable|string|max:1000',
        ]);

        $name = $validatedData['name'];
        $imageExtension = $request->file('image')->extension();
        $imagePath = $request->file('image')->storeAs('public/coffeList/', $name . '.' . $imageExtension);

        $product = new Product();
        $product->productName = $name;
        $product->productImage = $name . '.' . $imageExtension;
        $product->productCategory = $validatedData['category'];
        $product->productPrice = $validatedData['price'];
        $product->productDairyFree = $validatedData['dairyFree'] === 'YES';
        $product->productActive = $validatedData['active'] === 'YES';
        $product->productDescription = $validatedData['description'];
        $product->save();
        
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nameManage' => 'required|string|max:255',
            'imageManage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoryManage' => 'required|string|max:255',
            'priceManage' => 'required|numeric|min:0',
            'dairyFreeManage' => 'required|in:YES,NO',
            'activeManage' => 'required|in:YES,NO',
            'descriptionManage' => 'nullable|string|max:1000',
        ]);

        $product = Product::find($id);
        
        $product->productName = $validatedData['nameManage'];
        $product->productCategory = $validatedData['categoryManage'];
        $product->productPrice = $validatedData['priceManage'];
        $product->productDairyFree = $validatedData['dairyFreeManage'] === 'YES';
        $product->productActive = $validatedData['activeManage'] === 'YES';
        $product->productDescription = $validatedData['descriptionManage'];
        
        if ($request->hasFile('imageManage')) {
            $name = $validatedData['nameManage'];
            $imageExtension = $request->file('imageManage')->extension();
            $imagePath = $request->file('imageManage')->storeAs('public/coffeList/', $name . '.' . $imageExtension);
            $product->productImage = $name . '.' . $imageExtension;
        }

        $product->save();
        $products = Product::all();
        return view('upload', compact('products'));
    }
    function order() {
        $products = Product::all();
        return view('salespage', compact('products'));
    }
    
}
