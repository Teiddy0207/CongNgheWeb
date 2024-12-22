<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa thuốc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
          crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Chỉnh sửa thông tin thuốc</h1>

        <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên thuốc</label>
                <input type="email" class="form-control" id="name" name="name" value="{{ old('name', $medicine->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Thương hiệu</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $medicine->brand) }}">
            </div>

            <div class="mb-3">
                <label for="dosage" class="form-label">Liều lượng</label>
                <input type="text" class="form-control" id="dosage" name="dosage" value="{{ old('dosage', $medicine->dosage) }}" required>
            </div>

            <div class="mb-3">
                <label for="form" class="form-label">Dạng thuốc</label>
                <input type="text" class="form-control" id="form" name="form" value="{{ old('form', $medicine->form) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $medicine->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Số lượng tồn</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $medicine->stock) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
