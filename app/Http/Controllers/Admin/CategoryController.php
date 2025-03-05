<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->get();
        return view('admin.categorys.index', compact('categories')); // Sửa đường dẫn view
    }

    public function create()
    {
        return view('admin.categorys.create'); // Sửa đường dẫn view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('category.index')->with('success', 'Tạo danh mục thành công.');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categorys.show', compact('category')); // Sửa đường dẫn view
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categorys.edit', compact('category')); // Sửa đường dẫn view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Đã xóa danh mục tạm thời.');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('category.index')->with('success', 'Khôi phục danh mục thành công.');
    }

    public function forceDelete($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()->route('category.index')->with('success', 'Danh mục đã bị xóa vĩnh viễn.');
    }
}
