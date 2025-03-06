@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-warning text-white text-center py-3 rounded-top">
            <h4 class="mb-0 fw-bold"><i class="fas fa-edit"></i> Chỉnh sửa danh mục món ăn</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold text-muted">
                            <i class="fas fa-hamburger"></i> Tên danh mục
                        </label>
                        <input type="text" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $category->name) }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-warning text-white w-100 py-2 fw-bold rounded-3 shadow-lg">
                    <i class="fas fa-save"></i> Cập nhật danh mục
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
