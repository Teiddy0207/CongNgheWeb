<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thuốc mới</title>
</head>
<body>
    <h1>Thêm thuốc mới</h1>

    <!-- Hiển thị lỗi validation nếu có -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form thêm thuốc -->
    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf <!-- Bảo vệ CSRF token -->

        <label for="name">Tên thuốc:</label><br>
        <input type="text" id="name" name="name" ><br><br>

        <label for="brand">Thương hiệu (tuỳ chọn):</label><br>
        <input type="text" id="brand" name="brand"><br><br>

        <label for="dosage">Liều lượng:</label><br>
        <input type="text" id="dosage" name="dosage" ><br><br>

        <label for="form">Dạng thuốc:</label><br>
        <input type="text" id="form" name="form" ><br><br>

        <label for="price">Giá:</label><br>
        <input type="number" step="0.01" id="price" name="price" ><br><br>

        <label for="stock">Số lượng tồn:</label><br>
        <input type="number" id="stock" name="stock" ><br><br>

        <button type="submit">Thêm thuốc</button>
    </form>

    <br>
    <a href="{{ route('medicines.index') }}">Quay lại danh sách thuốc</a>
</body>
</html>
