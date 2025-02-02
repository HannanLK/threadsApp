<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the 8 newest products
        $newArrivals = Product::orderBy('created_at', 'desc')->take(8)->get();

        // Pass data to the home view
        return view('home', compact('newArrivals'));
    }
}

