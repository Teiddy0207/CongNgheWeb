<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách</title>
</head>
<body>
    <h1>Thêm Sách Mới</h1>
    <form method="POST" action="../../controllers/index.php?action=create">
    <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="published_year">Năm xuất bản:</label>
        <input type="number" id="published_year" name="published_year" required>
        <br>
        <label for="genre">Thể loại:</label>
        <input type="text" id="genre" name="genre" required>
        <br>
        <button type="submit">Thêm Sách</button>
        <a href="index.php">Trở lại</a>
    </form>
</body>
</html>
