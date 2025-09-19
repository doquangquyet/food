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
    /** ------------------ DANH SÁCH ------------------ */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /** ------------------ FORM TẠO ------------------ */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /** ------------------ LƯU SẢN PHẨM MỚI ------------------ */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:available,unavailable',
            'images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create($request->only([
            'category_id', 'name', 'description', 'price', 'status'
        ]));

        // Lưu nhiều ảnh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Món ăn đã được thêm thành công!');
    }

    /** ------------------ XEM CHI TIẾT ------------------ */
    public function show($id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /** ------------------ FORM CHỈNH SỬA ------------------ */
    public function edit($id)
    {
        $product    = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /** ------------------ CẬP NHẬT ------------------ */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:available,unavailable',
            'images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product->update($request->only([
            'category_id', 'name', 'description', 'price', 'status'
        ]));

        // Lưu thêm ảnh mới (không xoá ảnh cũ)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $path
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /** ------------------ XOÁ ẢNH RIÊNG LẺ ------------------ */
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        // Xoá file trong storage
        if ($image->image && Storage::exists('public/' . $image->image)) {
            Storage::delete('public/' . $image->image);
        }

        // Xoá bản ghi
        $image->delete();

        return response()->json(['message' => 'Ảnh đã được xoá thành công.']);
    }

    /** ------------------ XOÁ SẢN PHẨM ------------------ */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xoá ảnh liên quan
        foreach ($product->images as $image) {
            if ($image->image && Storage::exists('public/' . $image->image)) {
                Storage::delete('public/' . $image->image);
            }
            $image->delete();
        }

        // Xoá sản phẩm
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xoá!');
    }
}
