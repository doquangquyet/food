<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm kèm ảnh
        $products = Product::with('images')->latest()->take(6)->get();

        // Trả về view và truyền biến $products
        return view('giaodien.home', compact('products'));
    }
}
