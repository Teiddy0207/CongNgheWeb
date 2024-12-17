<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add issues</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <h1 style="margin: 50px 50px">Them van de moi</h1>
    <form action="{{route('issues.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="computer_id" class="form-label">Mã máy tính</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Bao cao ngay bao nhieu</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sự cố</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>





        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ sự cố</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái hiện tại</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Them</button>
        <a href="{{route('issues.index')}}" class="btn btn-secondary">Huy</a>

    </form>
</body>

</html>