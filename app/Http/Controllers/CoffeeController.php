<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{   
    public function ordermanage(){
        $status = request()->segment(2); 
        if ($status && in_array($status, ['all-orders', 'dispatch', 'pending', 'completed'])) {
            if ($status === 'all-orders') {
                $orders = Order::all();
            } else {
                $orders = Order::where('orderStatus', ucfirst($status))->get(); 
            }
        } else {
            $orders = Order::all(); 
        }

        return view('orderManagement', compact('orders'));
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
        $products = Product::where('productActive', 1)->get();
        return view('salespage', compact('products'));
    }
    public function profile()
    {
        $orders = Auth::user()->orders()->with('products')->get();

        return view('profile', compact('orders'));
    }
    function updateProfile(Request $request) {
        $orders = Auth::user()->orders()->with('products')->get();
        $request->validate([
            'customerName' => 'required|string|max:255',
            'customerEmail' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'customerAddress' => 'nullable|string|max:500',
        ]);
    
        
        $user = Auth::user(); 
        $user->name = $request->input('customerName');
        $user->email = $request->input('customerEmail');
        $user->address = $request->input('customerAddress');
        $user->save();
    
        return view('profile',compact('orders'));
    }
    public function submitorder(Request $request)
    {
        
        $order = \App\Models\Order::create([
            'id' => auth()->id(), 
            'orderStatus' => 'pending',
        ]);

        
        $cartData = json_decode($request->input('cartData'), true);

        
        if (!is_array($cartData)) {
            return redirect()->back()->withErrors('Invalid cart data.');
        }

        
        foreach ($cartData as $item) {
            \App\Models\OrderProduct::updateOrCreate(
                ['orderID' => $order->orderID, 'productID' => $item['productID']],
                ['quantity' => $item['quantity']]
            );
        }
        
        return redirect()->back();
    }
    public function ordermanageuser($button,$id){
        $ord = Order::find($id);
        $orders= Order::all();
        $status = request()->segment(2); 
        if ($status && in_array($status, ['all-orders', 'dispatch', 'pending', 'completed'])) {
            if ($status === 'all-orders') {
                $orders = Order::all();
            } else {
                $orders = Order::where('orderStatus', ucfirst($status))->get();
            }
        } else {
            $orders = Order::all(); 
        }

        return view('ordercontents',['ord' => $ord, 'orders' => $orders]);
    }
    public function generateReceipt($orderId)
    {
        
        $order = Order::with('products')->findOrFail($orderId);

        
        $data = [
            'order' => $order,
            'products' => $order->products,
        ];

        $pdf = PDF::loadView('receipt', $data);

       

        
        return $pdf->download('order_' . $orderId . '_receipt.pdf');
    }
    public function allcustomer(){
        $customers = User::where('role', 'customer')->get();
        return view('customer',compact('customers'));
    }
    public function updateStatus(Request $request,$orderID)
    {
        
        $request->validate([
            'orderStatus' => 'required|in:pending,dispatch,completed',
        ]);

        
        $order = Order::findOrFail($orderID);

        
        $order->orderStatus = $request->input('orderStatus');
        $order->save();

        
        return redirect()->back();
    }
}
