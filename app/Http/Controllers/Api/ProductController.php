<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all()->map(function ($product) {
            $product->images = array_map(function ($image) {
                return url('storage/' . $image);
            }, $product->images);
           
            return $product;
        });

        return response()->json($products);
    }

    public function getMenProducts()
    {
        $products = Product::where('category', 'Men')->get()->map(function ($product) {
            $product->images = array_map(function ($image) {
                return url('storage/' . $image);
            }, $product->images);
           
            return $product;
        });

        return response()->json($products);
    }

    public function getWomenProducts()
    {
        $products = Product::where('category', 'Women')->get()->map(function ($product) {
            $product->images = array_map(function ($image) {
                return url('storage/' . $image);
            }, $product->images);
           
            return $product;
        });

        return response()->json($products);
    }

    public function getProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $product->images = array_map(function ($image) {
            return url('storage/' . $image);
        }, $product->images);

        return response()->json($product);
    }
}