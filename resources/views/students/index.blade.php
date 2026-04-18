@extends('layout')

@section('content')

<<<<<<< HEAD
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
=======
<div class="container mt-4">

    <h2 class="text-center text-primary mb-4">
        📚 Danh Sách Sinh Viên
    </h2>

    <div class="d-flex justify-content-between mb-3">
        <span class="text-muted">
            Tổng số: <b>{{ count($students) }}</b> sinh viên
        </span>

        <a href="/students/create" class="btn btn-success">
            ➕ Thêm Sinh Viên
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-hover table-striped align-middle text-center">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngành Học</th>
                        <th width="180">Chức Năng</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)

                    <tr>
                        <td class="fw-bold text-primary">
                            {{ $student->id }}
                        </td>

                        <td>
                            {{ $student->name }}
                        </td>

                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $student->major }}
                            </span>
                        </td>

                        <td>
                            <a href="/students/edit/{{ $student->id }}" 
                               class="btn btn-warning btn-sm me-1">
                                ✏️ Sửa
                            </a>

                            <a href="/students/delete/{{ $student->id }}" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc muốn xóa?')">
                                🗑️ Xóa
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>
>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6

@endsection