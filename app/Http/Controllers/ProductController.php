<?php

namespace App\Http\Controllers;

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

    public function order(Request $request, $id)
    {
        $product = Product::find($id);
        if($product->stock < intval($request->order)) {
            return response()->json(['success' => false, 'message' => 'out of stock']);
        } else {
            // todo: add to shopping cart
        }
    }
    
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
    }
}
