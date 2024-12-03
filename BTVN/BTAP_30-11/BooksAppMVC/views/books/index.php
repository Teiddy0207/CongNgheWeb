
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
</head>
<body>
    <h1>Danh sách Sách</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Published Year</th>
                <th>Genre</th>
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
