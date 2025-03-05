@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center py-3 rounded-top">
            <h4 class="mb-0 fw-bold"><i class="fas fa-utensils"></i> Chỉnh Sửa Món Ăn</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Danh mục -->
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label fw-bold text-muted"><i class="fas fa-list-alt"></i> Danh mục</label>
                        <select class="form-select rounded-3 shadow-sm @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option disabled>Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tên món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold text-muted"><i class="fas fa-hamburger"></i> Tên món ăn</label>
                        <input type="text" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Mô tả món ăn -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold text-muted"><i class="fas fa-file-alt"></i> Mô tả</label>
                    <textarea class="form-control rounded-3 shadow-sm @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <!-- Giá món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold text-muted"><i class="fas fa-dollar-sign"></i> Giá</label>
                        <input type="number" class="form-control rounded-3 shadow-sm @error('price') is-invalid @enderror" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Trạng thái món ăn -->
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label fw-bold text-muted"><i class="fas fa-toggle-on"></i> Trạng thái</label>
                        <select class="form-select rounded-3 shadow-sm @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="available" {{ $product->status == 'available' ? 'selected' : '' }}>Còn hàng</option>
                            <option value="unavailable" {{ $product->status == 'unavailable' ? 'selected' : '' }}>Hết hàng</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Ảnh món ăn -->
                <div class="mb-3">
                    <label for="images" class="form-label fw-bold text-muted"><i class="fas fa-image"></i> Ảnh món ăn</label>
                    <input type="file" class="form-control rounded-3 shadow-sm @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                    @error('images')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Hiển thị ảnh cũ -->
                    <div class="mt-3 d-flex flex-wrap">
                        @foreach($product->images as $image)
                            <div class="position-relative me-2 mb-2" style="display: inline-block;">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image" class="rounded-3 shadow-sm" width="100">
                                <form action="{{ route('admin.products.deleteImage', $image->id) }}" method="POST" class="position-absolute top-0 start-100 translate-middle" onsubmit="return confirm('Bạn có chắc chắn muốn xóa ảnh này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Nút cập nhật -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success text-white w-100 py-2 fw-bold rounded-3 shadow-lg">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
