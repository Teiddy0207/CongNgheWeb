<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Thêm Vấn Đề</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Thêm Vấn Đề Mới</h1>
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="computer_id" class="form-label">Máy Tính</label>
                <select class="form-select" id="computer_id" name="computer_id" required>
                    <option value="" selected disabled>Chọn máy tính</option>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computers_name }} ({{ $computer->model }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="reported_by" class="form-label">Người Báo Cáo</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by"
                    placeholder="Nhập tên người báo cáo" required>
            </div>
            <div class="mb-3">
                <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                <input type="date" class="form-control" id="reported_date" name="reported_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả Sự Cố</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    placeholder="Nhập chi tiết sự cố" required></textarea>
            </div>

            <div class="mb-3">
                <label for="urgency" class="form-label">Mức Độ Sự Cố</label>
                <select class="form-select" id="urgency" name="urgency" required>
                    <option value="" selected disabled>Chọn mức độ</option>
                    <option value="low">Thấp</option>
                    <option value="medium">Trung bình</option>
                    <option value="high">Cao</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="" selected disabled>Chọn trạng thái</option>
                    <option value="Open">pending</option>
                    <option value="In Progress">resolved</option>
                    <option value="Resolved">unresolved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Thêm Vấn Đề</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqxarZxrA3aoDoz0UhS9bETAUiwjBIwQa+PvP5zFhku9p6jizoXJUb0I8IPmW"
        crossorigin="anonymous"></script>
</body>

</html>