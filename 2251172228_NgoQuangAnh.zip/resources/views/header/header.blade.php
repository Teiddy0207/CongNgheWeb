<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
    /* public/css/style.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
}

header {
    background-color: #2c3e50;
    color: white;
    padding: 15px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.table-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-title h2 {
    margin: 0;
    font-size: 1.5em;
}

.add-button a {
    background-color: #27ae60;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.add-button a:hover {
    background-color: #219150;
}

.container {
    max-width: 1300px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table {
    width: 1300px ;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eaeaea;
}

th {
    background-color: #2c3e50;
    color: white;
}

tr:hover {
    background-color: #f2f2f2;
}

.post-title {
    font-size: 1.2em;
    color: #2c3e50;
}

.post-content {
    color: #7f8c8d;
    font-size: 1em;
    margin: 5px 0;
}

.post-date {
    color: #bdc3c7;
    font-size: 0.9em;
}
.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9em;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

/* Nút Edit */
.btn-warning {
    background-color: #f39c12;
    color: white;
}

.btn-warning:hover {
    background-color: #e67e22;
}

/* Nút Delete */
.btn-danger {
    background-color: #c0392b;
    color: white;
}

.btn-danger:hover {
    background-color: #a93226;
}


.pagination {
    display: flex;
    justify-content: center; /* Căn giữa phân trang */
    list-style-type: none; /* Bỏ dấu đầu dòng */
    padding: 0; /* Bỏ padding mặc định */
    margin: 20px 0; /* Thêm khoảng cách trên và dưới */
}

.pagination li {
    margin: 0 5px; /* Khoảng cách giữa các nút phân trang */
}

.pagination a, .pagination span {
    display: inline-block;
    padding: 10px 15px; /* Padding cho các nút */
    border: 1px solid #2c3e50; /* Đường viền cho nút */
    border-radius: 4px; /* Bo góc cho nút */
    text-decoration: none; /* Bỏ gạch chân */
    color: #2c3e50; /* Màu chữ */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu */
}

/* Màu nền và màu chữ khi hover */
.pagination a:hover, .pagination span:hover {
    background-color: #2c3e50; /* Màu nền khi hover */
    color: white; /* Màu chữ khi hover */
}

/* Màu cho nút đang hoạt động */
.pagination .active span {
    background-color: #2c3e50; /* Màu nền cho nút đang hoạt động */
    color: white; /* Màu chữ cho nút đang hoạt động */
}
</style>

</head>
<body>
    <header>
        <div class="table-title">
            <h2>Quản Lý <b>Cầu thủ</b></h2>
            <div class="add-button">
                <a href="{{route('players.create')}}">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm cầu thủ</span>
                </a>                    
            </div>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>