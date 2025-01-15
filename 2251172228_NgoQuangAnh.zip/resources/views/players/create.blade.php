<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tạo Mới Sản Phẩm</title>

    <style>
        body {
            background: #f5f5f5;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 50px auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #435d7d;
            font-weight: bold;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-control, .form-select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #435d7d;
            outline: none;
            box-shadow: 0 0 5px rgba(67, 93, 125, 0.5);
        }

        .btn-primary {
            background-color: #435d7d;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #364b61;
        }

        .btn-secondary {
            margin-top: 10px;
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-bottom: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
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
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            .btn-primary,
            .btn-secondary {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Them cau thu</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route ('players.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">tên cầu thủ</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">vị trí</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">number</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Sinh nhat</label>
                <input type="text" class="form-control" id="birthday" name="birthday" required>
            </div>

            <div class="mb-3">
                <label for="club_id" class="form-label">CLB</label>
                <select class="form-control" id="club_id" name="club_id" required>
                    <option value="">Chọn câu lạc bộ</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>

       

            <button type="submit" class="btn btn-primary">Tạo Mới</button>
            <a  class="btn btn-secondary" style = "margin-top: 50px">Quay Lại</a>
        </form>
    </div>
</body>

</html>
