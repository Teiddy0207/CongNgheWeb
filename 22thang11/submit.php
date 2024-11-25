<?php
session_start();

// Lấy danh sách sản phẩm từ session
$products = $_SESSION['products'] ?? [];

// Kiểm tra tham số action và id
$action = $_GET['action'] ?? 'add';
$id = $_GET['id'] ?? null;

// Giá trị mặc định cho form
$name = '';
$price = '';
$imagePath = '';

// Nếu đang sửa sản phẩm
if ($action === 'edit' && isset($id)) {
    // Lấy thông tin sản phẩm từ session nếu đang sửa
    $name = $products[$id]['name'] ?? '';
    $price = $products[$id]['price'] ?? '';
    $imagePath = $products[$id]['image'] ?? ''; // Kiểm tra giá trị image
}

if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $imagePath = ''; // Reset giá trị image

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Lấy thông tin file
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = uniqid() . '.' . $fileExtension;
            $imagePath = 'uploads/' . $newFileName;
            if (move_uploaded_file($fileTmpPath, $imagePath)) {
                echo "Ảnh đã được tải lên thành công!";
            } else {
                echo "Lỗi khi di chuyển file.";
            }
        } else {
            echo "Chỉ chấp nhận các định dạng ảnh: jpg, jpeg, png, gif, webp.";
        }
    }

    // Cập nhật hoặc thêm sản phẩm
    if ($action === 'edit' && isset($id)) {
        $products[$id] = ['name' => $name, 'price' => (int)$price, 'image' => $imagePath ?: $products[$id]['image']];
    } else {
        $products[] = ['name' => $name, 'price' => (int)$price, 'image' => $imagePath];
    }

    // Lưu danh sách sản phẩm vào session
    $_SESSION['products'] = $products;

    // Quay lại trang danh sách
    header('Location: Test2.php');
    exit();
}

// Kiểm tra yêu cầu xóa sản phẩm từ URL
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem sản phẩm có tồn tại trong session không
    if (isset($_SESSION['products'][$id])) {
        // Xóa sản phẩm
        unset($_SESSION['products'][$id]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $action === 'edit' ? 'Sửa sản phẩm' : 'Thêm sản phẩm mới' ?></title>
</head>
<body>
     <!-- Gọi header.php -->
     <?php include 'header.php'; ?>
    <h1><?= $action === 'edit' ? 'Sửa sản phẩm' : 'Thêm sản phẩm mới' ?></h1>

    <form action="submit.php?action=<?= $action ?>&id=<?= htmlspecialchars($id) ?>" method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required>
        <br><br>
        <label for="price">Giá thành:</label>
        <input type="number" name="price" id="price" value="<?= htmlspecialchars($price) ?>" required>
        <br><br>
        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <?php if ($imagePath): ?>
            <img src="<?= $imagePath ?>" alt="Hình ảnh sản phẩm" width="100">
        <?php endif; ?>
        <br><br>
        <button type="submit">Lưu sản phẩm</button>
    </form>
</body>
</html>
