<?php
session_start();

// Lấy danh sách sản phẩm từ session
$products = $_SESSION['products'] ?? [];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Danh sách sản phẩm</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
            word-wrap: break-word;
        }
        td img {
            max-width: 200px;
            height: auto;
        }
        td {
            overflow: hidden;
            text-overflow: ellipsis;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
     <!-- Gọi header.php -->
     <?php include 'header.php'; ?>
    <h1>Danh sách sản phẩm</h1>

    <form action="submit.php?action=add" method="get">
        <button class="btn btn-success">Thêm mới</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá thành</th>
                <th>Chức năng</th>
                <th>Ảnh minh họa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $id => $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</td>
                    <td>
                        <a href="submit.php?action=edit&id=<?= $id ?>">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                        <a href="submit.php?action=delete&id=<?= $id ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                    <td>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= htmlspecialchars($product['image']) ?> " style="width = 100px" alt="Hình ảnh sản phẩm">
                        <?php else: ?>
                            <p>Chưa có hình ảnh</p>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
