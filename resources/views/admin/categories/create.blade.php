@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center py-3 rounded-top">
            <h4 class="mb-0 fw-bold"><i class="fas fa-plus-circle"></i> Thêm danh mục món ăn mới</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold text-muted">
                            <i class="fas fa-hamburger"></i> Tên danh mục
                        </label>
                        <input type="text" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
                        
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success text-white w-100 py-2 fw-bold rounded-3 shadow-lg">
                    <i class="fas fa-save"></i> Thêm danh mục món ăn mới
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
