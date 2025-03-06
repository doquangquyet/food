@extends('admin.layout')
@section('content')
  <style>
 .action-buttons {
    display: flex;
    justify-content: center;
    gap: 8px; /* Khoảng cách giữa các nút */
}

.action-buttons .btn-group {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.action-buttons form {
    margin: 0;
}

.action-buttons .btn {
    min-width: 100px; /* Đảm bảo kích thước nút đồng đều */
    padding: 6px 12px;
}


  </style>
<a href="{{ route('admin.categories.create') }}" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2">
  Thêm mới danh mục  
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên Danh Mục</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
<tbody>
    @foreach($categories as $i)
    <tr>
        <th scope="row">{{ $i->id }}</th>
        <td>{{ $i->name ?? 'Không có danh mục' }}</td>
        <td class="action-buttons">
            <div class="btn-group" role="group">
                @if($i->trashed())
                    <!-- Nếu đã xóa, chỉ hiển thị "Khôi phục" và "Xóa vĩnh viễn" -->
                    <form action="{{ route('admin.categories.restore', $i->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-undo"></i> Khôi phục
                        </button>
                    </form>

                    <form action="{{ route('admin.categories.forceDelete', $i->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm">
                            <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                        </button>
                    </form>
                @else
                    <!-- Nếu chưa bị xóa, chỉ hiển thị "Sửa" và "Xóa" -->
                    <a href="{{ route('admin.categories.edit', $i->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Sửa
                    </a>

                    <form action="{{ route('admin.categories.destroy', $i->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </form>
                @endif
            </div>
        </td>
    </tr>
    @endforeach
</tbody>


</table>
@endsection
