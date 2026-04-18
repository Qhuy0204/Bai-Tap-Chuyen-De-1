@extends('layout')

@section('content')

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>✏️ Cập Nhật Sinh Viên</h4>
        </div>

        <div class="card-body">

            <form action="/students/update/{{ $student->id }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Tên sinh viên</label>
                    <input type="text" 
                           name="name" 
                           class="form-control"
                           value="{{ $student->name }}"
                           placeholder="Nhập tên sinh viên...">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Ngành học</label>
                    <input type="text" 
                           name="major" 
                           class="form-control"
                           value="{{ $student->major }}"
                           placeholder="Nhập ngành học...">
                </div>

                <div class="d-flex justify-content-between">

                    <a href="/students" class="btn btn-secondary">
                        ⬅️ Quay lại
                    </a>

                    <button type="submit" class="btn btn-success">
                        💾 Cập Nhật
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection