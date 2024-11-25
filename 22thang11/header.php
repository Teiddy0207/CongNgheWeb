<style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.header{
            display: flex; /* Sử dụng Flexbox để căn chỉnh các item */
    justify-content: space-between; /* Căn đều các mục từ trái sang phải */
    align-items: center; /* Căn giữa các mục theo chiều dọc */
    background-color: #333; /* Màu nền cho header */
    color: white; /* Màu chữ trắng */
    padding: 10px 20px;
        }

        .header-item {
    padding: 10px 20px; /* Khoảng cách giữa các mục */
    text-transform: uppercase; /* Viết hoa các chữ cái */
    font-weight: bold; /* Đậm chữ */
    cursor: pointer; /* Thêm hiệu ứng con trỏ khi di chuột */
    transition: background-color 0.3s ease; /* Thêm hiệu ứng khi hover */
}

/* Hiệu ứng hover khi người dùng di chuột */
.header-item:hover {
    background-color: #555; /* Đổi màu nền khi hover */
}

/* Căn giữa cho các mục chính */
.header-item:first-child {
    font-size: 1.2em; /* Lớn hơn cho mục đầu tiên (Administration) */
    font-weight: bold;
}
    </style>

<div class="header d-flex">
    <div class="header-item">Adminstration</div>
    <div class="header-item">Trang chu</div>
    <div class="header-item">Trang ngoai</div>
    <div class="header-item">The loai</div>
    <div class="header-item">Tac gia</div>
    <div class="header-item">Bai viet</div>
</div>
