<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return response()->json($products, Response::HTTP_OK);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($product, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:255|unique:products',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'sku' => 'required|string|max:255|unique:products,sku,' . $id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        return response()->json($product, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }
        
        $product->delete();
        
        return response()->json(['message' => 'Product deleted successfully'], Response::HTTP_OK);
    }
}

