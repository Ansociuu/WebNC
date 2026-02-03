<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() 
    {
        $categories = Category::withCount('products')->get();
        $products = Product::where('is_active', true)
            ->latest()
            ->take(6)
            ->get();
            
        return view('home', compact('categories', 'products'));
    }
}
