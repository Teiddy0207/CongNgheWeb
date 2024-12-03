<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sách</title>
</head>
<body>
    <h1>Sửa Sách</h1>
    <form method="POST" action="../../controllers/index.php?action=edit&id=<?= htmlspecialchars($_GET['id']) ?>">
        <label for="title">Tiêu đề:</label>
        <input 
            type="text" 
            id="title" 
            name="title" 
            value="<?= isset($book['Title']) ? htmlspecialchars($book['Title']) : '' ?>" 
            required
        >
        <br>
        <label for="published_year">Năm xuất bản:</label>
        <input 
            type="number" 
            id="published_year" 
            name="published_year" 
            value="<?= isset($book['PublishedYear']) ? htmlspecialchars($book['PublishedYear']) : '' ?>" 
            required
        >
        <br>
        <label for="genre">Thể loại:</label>
        <input 
            type="text" 
            id="genre" 
            name="genre" 
            value="<?= isset($book['Genre']) ? htmlspecialchars($book['Genre']) : '' ?>" 
            required
        >
        <br>
        <button type="submit">Cập nhật</button>
        <a href="index.php">Trở lại</a>
    </form>
</body>
</html>
