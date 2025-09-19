<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('admin.layout');
    }
    public function trangchu(){
       $products = Product::all();

        // Truyền sang view
        return view('giaodien.home', compact('products'));
    }public function login(){
        return view('giaodien.login');
    }
}
