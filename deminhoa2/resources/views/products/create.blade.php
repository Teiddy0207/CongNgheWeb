<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tạo Mới Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    body {
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 14px;
    }

    .container {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    h2 {
        margin-bottom: 20px;
        color: #435d7d;
        font-weight: bold;
        text-align: center;
    }

    .form-label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        border-radius: 4px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .form-select {
        border-radius: 4px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #435d7d;
        border-color: #435d7d;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #364b61;
        border-color: #364b61;
    }

    .btn-secondary {
        margin-left: 10px;
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .alert {
        margin-bottom: 20px;
        border-radius: 4px;
    }

    input[type="file"] {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
        font-size: 14px;
    }

    input[type="file"]::file-selector-button {
        margin-right: 10px;
        padding: 5px 10px;
        border: 1px solid #435d7d;
        border-radius: 4px;
        background: #435d7d;
        color: white;
        cursor: pointer;
        font-size: 14px;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #364b61;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        h2 {
            font-size: 18px;
        }

        .btn-primary,
        .btn-secondary {
            font-size: 14px;
            padding: 8px 12px;
        }
    }
</style>
</head>

<body>
    <div class="container mt-5">
        <h2>Tạo Mới Sản Phẩm</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required min="0.01" step="0.01">
            </div>
            <div class="mb-3">
                <label for="store_id" class="form-label">Cửa Hàng</label>
                <select class="form-select" id="store_id" name="store_id" required>
                    <option value="">Chọn cửa hàng</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Tạo Mới</button>


            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
</body>

</html>