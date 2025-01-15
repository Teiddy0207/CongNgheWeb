<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sản Phẩm</title>
 
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 8px;
            display: inline-block;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        li {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Chỉnh Cầu thủ</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('players.update', $player->id)}}" method="POST">
            @csrf
            @method('PUT') <!-- Thêm phương thức PUT để cập nhật -->
            <div class="mb-3">
                <label for="name" class="form-label">Tên cầu thủ</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $player->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">vị trí</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $player->position) }}" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Số áo</label>
                <textarea class="form-control" id="number" name="number">{{ old('number', $player->number) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Sinh nhật</label>
                <input type="number" step="0.01" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $player->birthday) }}" required>
            </div>
            <div class="mb-3">
                <label for="club_id" class="form-label">CLB</label>
                <select name="club_id" id="club_id" class="form-select" required>
                    <option value="">Chọn cửa hàng</option>
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}" {{ $club->id == $player->club_id ? 'selected' : '' }}>{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật cầu thủ</button>
        </form>
    </div>

   
   
</body>
</html>
