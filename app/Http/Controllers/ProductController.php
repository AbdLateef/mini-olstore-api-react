<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function create(Request $request)
    {
        Product::create($request->all());
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update($request->all());
    }

    public function order(Request $request)
    {
        $product = Product::find($request->id);
        if($product->stock < intval($request->amount)) {
            return response()->json(['success' => false, 'message' => 'out of stock']);
        } else {
            $order = new Order;
            $order->product_id = $request->id;
            $order->quantity = $request->amount;
            $order->customer_email = $request->email;
            $order->customer_name = $request->name;
            $order->customer_address = $request->address;
            $order->status = 'Processing';
            $order->save();

            Product::find($request->id)->decrement('stock', $request->amount);

            return response()->json(['success' => true, 'message' => 'success']);
        }
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
    }
}
