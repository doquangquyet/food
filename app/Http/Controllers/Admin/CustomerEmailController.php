<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerEmail;

class CustomerEmailController extends Controller
{
    // Hiển thị danh sách email khách hàng
    public function index()
    {
        $emails = CustomerEmail::latest()->paginate(10);
        return view('admin.customer_emails.index', compact('emails'));
    }

    // Hiển thị form thêm email
    public function create()
    {
        return view('admin.customer_emails.create');
    }

    // Lưu email mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customer_emails,email|max:255',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);

        CustomerEmail::create(['email' => $request->email]);

        return redirect()->route('customer-emails.index')->with('success', 'Thêm email thành công.');
    }
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customer_emails,email|max:255',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);

        CustomerEmail::create(['email' => $request->email]);

        return back()->with('success', 'Bạn đã đăng ký email thành công!');
    }
    // Hiển thị form chỉnh sửa email
    public function edit(CustomerEmail $customerEmail)
    {
        return view('admin.customer_emails.edit', compact('customerEmail'));
    }

    // Cập nhật email trong database
    public function update(Request $request, CustomerEmail $customerEmail)
    {
        $request->validate([
            'email' => 'required|email|unique:customer_emails,email,' . $customerEmail->id . '|max:255',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);

        $customerEmail->update(['email' => $request->email]);

        return redirect()->route('customer-emails.index')->with('success', 'Cập nhật email thành công.');
    }

    // Xóa email khỏi database
    public function destroy(CustomerEmail $customerEmail)
    {
        $customerEmail->delete();
        return redirect()->route('customer-emails.index')->with('success', 'Xóa email thành công.');
    }
}