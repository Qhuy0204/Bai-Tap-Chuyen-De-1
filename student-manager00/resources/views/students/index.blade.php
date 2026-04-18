@extends('layout')

@section('content')

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

@endsection