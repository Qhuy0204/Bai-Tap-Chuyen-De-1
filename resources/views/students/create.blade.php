<<<<<<< HEAD
<form method="POST" action="/students/store">
    @csrf

    <input name="name" placeholder="Tên" class="form-control"><br>
    <input name="major" placeholder="Ngành" class="form-control"><br>
    <input name="email" placeholder="Email" class="form-control"><br>

    <button class="btn btn-primary">Lưu</button>
</form>
=======
@extends('layout')

@section('content')

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-success text-white text-center">
            <h4>➕ Thêm Sinh Viên</h4>
        </div>

        <div class="card-body">

            {{-- Hiển thị lỗi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/students/store" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Tên sinh viên</label>
                    <input type="text" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Nhập tên sinh viên...">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Ngành học</label>
                    <input type="text" 
                           name="major" 
                           class="form-control @error('major') is-invalid @enderror"
                           value="{{ old('major') }}"
                           placeholder="Nhập ngành học...">

                    @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/students" class="btn btn-secondary">
                        ⬅️ Quay lại
                    </a>

                    <button type="submit" 
                            class="btn btn-success"
                            onclick="return confirm('Bạn có chắc muốn thêm sinh viên?')">
                        💾 Lưu
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6
