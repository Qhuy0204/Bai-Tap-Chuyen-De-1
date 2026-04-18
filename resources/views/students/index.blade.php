@extends('layout')

@section('content')

<h2>Quản lý sinh viên</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="/students">
    @csrf
    <input name="name" placeholder="Tên" class="form-control mb-2">
    <input name="major" placeholder="Ngành" class="form-control mb-2">
    <input name="email" placeholder="Email" class="form-control mb-2">
    <button class="btn btn-primary">Thêm</button>
</form>

<hr>

<table class="table table-bordered">
<tr>
<th>Tên</th>
<th>Ngành</th>
<th>Email</th>
</tr>

@foreach($students as $s)
<tr>
<td>{{ $s->name }}</td>
<td>{{ $s->major }}</td>
<td>{{ $s->email }}</td>
</tr>
@endforeach
</table>

{{ $students->links() }}

@endsection