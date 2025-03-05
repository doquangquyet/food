@extends('admin.layout')
@section('content')
<a href="{{ route('admin.products.create') }}" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2">
  Thêm mới sản phẩm  
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên Đanh Mục</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Miểu tả</th>
      <th scope="col">Giá</th>
      <th scope="col">Hình Ảnh </th>
      <th scope="col">Trạng Thái Sản phẩm </th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $produc)
    <tr>
    <th scope="row">{{ $produc->id }}</th>
     <td>{{ $produc->category->name ?? 'Không có danh mục' }}</td>
    <td>{{ $produc->name }}</td>
    <td>{{ $produc->description }}</td>
    <td>{{ $produc->price }}</td>
    <td>
    @if($produc->images->count() > 0)
    <div class="row">
        @foreach($produc->images as $image)
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $image->image) }}" alt="Ảnh sản phẩm" class="img-thumbnail">
            </div>
        @endforeach
    </div>
@endif</td>
    <td>{{ $produc->status }}</td>
    <td> 
    <a href="{{ route('admin.products.edit', $produc->id) }}"><i class="fas fa-edit"></i>Sửa </a>
  <form action="{{ route('admin.products.destroy', $produc->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i> Xóa
    </button>
</form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection