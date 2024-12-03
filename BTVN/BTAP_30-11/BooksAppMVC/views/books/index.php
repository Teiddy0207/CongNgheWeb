
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bao gồm file mô hình
require_once '../../models/BookModel.php'; // Điều chỉnh đường dẫn nếu cần
$bookModel = new BookModel();
$books = $bookModel->getAllBooks(); // Lấy dữ liệu sách



?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sách</title>
    <style>
        /* Reset CSS */
body, h1, table {
    margin: 0;
    padding: 0;
}

/* Thiết lập font chữ và nền */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    padding: 20px;
}

/* Tiêu đề */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

/* Bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
}

table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f8f9fa;
}

table tr:hover {
    background-color: #e9ecef;
}

/* Liên kết */
a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
    color: #0056b3;
}

    </style>
</head>
<body>
    <h1>Danh sách Sách</h1>
    <div style="margin-bottom: 20px; text-align: center;">
        <a href="./create.php" style="text-decoration: none; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Thêm Sách</a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Published Year</th>
                <th>Genre</th>
                <th>function</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book['BookID']) ?></td>
                        <td><?= htmlspecialchars($book['Title']) ?></td>
                        <td><?= htmlspecialchars($book['PublishedYear']) ?></td>
                        <td><?= htmlspecialchars($book['Genre']) ?></td>
                        <td>
                            <a href="./edit.php?id=<?= $book['BookID'] ?>">Sửa</a>
                            |
                            <a href="../../controllers/index.php?action=delete&id=<?= $book['BookID'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                            </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Không có sách nào trong cơ sở dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
