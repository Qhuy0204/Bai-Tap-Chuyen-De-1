@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-3">Đăng ký môn học</h2>

    {{-- Thông báo --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM --}}
    <div class="card mb-4">
        <div class="card-body">

            <form method="POST" action="{{ url('/enrollments') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Chọn sinh viên</label>
                    <select name="student_id" class="form-control">
                        @foreach($students as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Chọn môn học</label>
                    <select name="course_id" class="form-control">
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }} ({{ $c->credits }} tín chỉ)
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Đăng ký</button>
            </form>

        </div>
    </div>

    {{-- DANH SÁCH --}}
    <h4>Danh sách đã đăng ký</h4>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Sinh viên</th>
                <th>Môn học</th>
                <th>Tín chỉ</th>
            </tr>
        </thead>

        <tbody>
            @forelse($enrollments as $e)
                <tr>
                    <td>{{ $e->student->name ?? 'N/A' }}</td>
                    <td>{{ $e->course->name ?? 'N/A' }}</td>
                    <td>{{ $e->course->credits ?? '0' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-danger">
                        Chưa có dữ liệu đăng ký
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection