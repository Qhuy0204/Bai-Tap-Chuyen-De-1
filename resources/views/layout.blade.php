<!DOCTYPE html>
<html>
<head>
    <title>Quản lý hệ thống</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel App</a>

        <div>
            <a href="{{ route('students.index') }}" 
               class="btn btn-light {{ request()->is('students') ? 'active' : '' }}">
               Sinh viên
            </a>

            <a href="{{ route('products.index') }}" 
               class="btn btn-light {{ request()->is('products') ? 'active' : '' }}">
               Sản phẩm
            </a>

            <a href="{{ route('enrollments.index') }}" 
               class="btn btn-light {{ request()->is('enrollments') ? 'active' : '' }}">
               Đăng ký môn học
            </a>

            <a href="{{ route('orders.index') }}" 
               class="btn btn-light {{ request()->is('orders') ? 'active' : '' }}">
               Đơn hàng
            </a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">
    @yield('content')
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

</body>
</html>