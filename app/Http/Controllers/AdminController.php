<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'users_count' => User::count(),
            'products_count' => Product::count(),
            'news_count' => News::count(),
            'categories_count' => Category::count(),
        ];

        $latest_users = User::latest()->take(5)->get();
        $latest_products = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latest_users', 'latest_products'));
    }
}
