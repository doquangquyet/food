<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(){
        $product = Product::with('category')->get();
        return view('admin.products.index' , compact('product'));
    }

    // Hiển thị form tạo sản phẩm
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('products','categories'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Mỗi ảnh tối đa 2MB
        ]);
    
        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);
    
        // Lưu nhiều ảnh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public'); // Lưu vào storage/public/products
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }
    
        return redirect()->route('admin.products.index')->with('success', 'Món ăn đã được thêm thành công!');
    }
    
    
    

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.index', compact('product'));
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validate dữ liệu đầu vào
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:available,unavailable',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Chỉ chấp nhận ảnh có dung lượng < 2MB
    ]);

    // Cập nhật thông tin sản phẩm
    $product->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    // Xử lý ảnh mới
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public'); // Lưu ảnh vào storage/app/public/products
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path
            ]);
        }
    }

    return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
}

    
    // Xóa ảnh riêng lẻ
    public function deleteImage($id)
{
    $image = ProductImage::findOrFail($id);
    
    // Đánh dấu là đã xóa (soft delete)
    $image->delete();

    return back()->with('success', 'Ảnh đã được chuyển vào thùng rác!');
}

    

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa!');
    }
}


