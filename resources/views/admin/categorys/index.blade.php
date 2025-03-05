@extends('admin.layout')
@section('content')
<a href="{{ route('admin.categories.create') }}" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2">
  Thêm mới sản phẩm  
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên Đanh Mục</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $i)
    <tr>
    <th scope="row">{{ $i->id }}</th>
     <td>{{ $i->name ?? 'Không có danh mục' }}</td>
  
    <td> 
    <a href="{{ route('admin.categories.edit', $produc->id) }}"><i class="fas fa-edit"></i>Sửa </a>
  <form action="{{ route('admin.categories.destroy', $produc->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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