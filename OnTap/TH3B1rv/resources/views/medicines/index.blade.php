<!DOCTYPE html>
<html>
<head>
    <title>Danh sách thuốc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <h1>Danh sách các loại thuốc</h1>

    <a class="btn btn-sm btn-success" href={{
    route('medicines.createhehe') }}>Add Post</a>
                </div>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên thuốc</th>
                <th>Thương hiệu</th>
                <th>Liều lượng</th>
                <th>Dạng thuốc</th>
                <th>Giá</th>
                <th>Số lượng tồn</th>
                <th>Chuc nang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
            <tr>
                <td>{{ $medicine->id }}</td>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->brand }}</td>
                <td>{{ $medicine->dosage }}</td>
                <td>{{ $medicine->form }}</td>
                <td>{{ $medicine->price }}</td>
                <td>{{ $medicine->stock }}</td>

                <td>
                
                        <!-- Nút Sửa -->
                        <a class="btn btn-sm btn-primary" href="{{ route('medicines.edit', $medicine->id) }}">Sửa</a>

                        <!-- Nút Xóa -->
                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
