@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center py-3 rounded-top">
            <h4 class="mb-0 fw-bold"><i class="fas fa-plus-circle"></i> Thêm Món Ăn Mới</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Danh mục -->
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label fw-bold text-muted"><i class="fas fa-list-alt"></i> Danh mục</label>
                        <select class="form-select rounded-3 shadow-sm" id="category_id" name="category_id">
                            <option selected disabled>Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tên món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold text-muted"><i class="fas fa-hamburger"></i> Tên món ăn</label>
                        <input type="text" class="form-control rounded-3 shadow-sm" id="name" name="name">
                    </div>
                </div>

                <!-- Mô tả món ăn -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold text-muted"><i class="fas fa-file-alt"></i> Mô tả</label>
                    <textarea class="form-control rounded-3 shadow-sm" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="row">
                    <!-- Giá món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold text-muted"><i class="fas fa-dollar-sign"></i> Giá</label>
                        <input type="number" class="form-control rounded-3 shadow-sm" id="price" name="price" step="0.01">
                    </div>

                    <!-- Trạng thái món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label fw-bold text-muted"><i class="fas fa-toggle-on"></i> Trạng thái</label>
                        <select class="form-select rounded-3 shadow-sm" id="status" name="status">
                            <option value="available">Còn hàng</option>
                            <option value="unavailable">Hết hàng</option>
                        </select>
                    </div>
                </div>

                <!-- Ảnh món ăn (cho phép nhiều ảnh) -->
                <div class="mb-3">
                    <label for="images" class="form-label fw-bold text-muted"><i class="fas fa-images"></i> Ảnh món ăn</label>
                    <input type="file" class="form-control rounded-3 shadow-sm" id="images" name="images[]" multiple>
                    <small class="text-muted">Có thể chọn nhiều ảnh cùng một lúc</small>
                </div>

                <!-- Nút thêm món ăn -->
                <button type="submit" class="btn btn-success text-white w-100 py-2 fw-bold rounded-3 shadow-lg">
                    <i class="fas fa-save"></i> Thêm Món Ăn
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
