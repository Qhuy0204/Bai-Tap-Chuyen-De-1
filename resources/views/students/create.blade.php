<form method="POST" action="/students/store">
    @csrf

    <input name="name" placeholder="Tên" class="form-control"><br>
    <input name="major" placeholder="Ngành" class="form-control"><br>
    <input name="email" placeholder="Email" class="form-control"><br>

    <button class="btn btn-primary">Lưu</button>
</form>