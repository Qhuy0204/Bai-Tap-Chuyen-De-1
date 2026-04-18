@extends('layout')

@section('content')

<h2>Quản lý sản phẩm</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- FORM THÊM -->
<form method="POST" action="/products">
    @csrf
    <input name="name" placeholder="Tên" class="form-control mb-2">
    <input name="price" placeholder="Giá" class="form-control mb-2">
    <input name="quantity" placeholder="Số lượng" class="form-control mb-2">
    <input name="category" placeholder="Danh mục" class="form-control mb-2">
    <button class="btn btn-primary">Thêm</button>
</form>

<hr>

<!-- DANH SÁCH -->
<table class="table table-bordered">
<tr>
<th>Tên</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Danh mục</th>
<th>Trạng thái</th>
<th>Hành động</th>
</tr>

@foreach($products as $p)
<tr>
<td>{{ $p->name }}</td>
<td>{{ $p->price }}</td>
<td>{{ $p->quantity }}</td>
<td>{{ $p->category }}</td>

<td>
@if($p->quantity == 0)
<span class="badge bg-danger">Hết hàng</span>
@elseif($p->quantity < 5)
<span class="badge bg-warning">Sắp hết</span>
@else
<span class="badge bg-success">Còn hàng</span>
@endif
</td>

<td>
<form method="POST" action="/products/update/{{ $p->id }}">
@csrf
<input name="quantity" value="{{ $p->quantity }}" style="width:70px">
<button class="btn btn-warning btn-sm">Sửa</button>
</form>

<a href="/products/delete/{{ $p->id }}" class="btn btn-danger btn-sm">Xóa</a>
</td>
</tr>
@endforeach

</table>

{{ $products->links() }}

@endsection