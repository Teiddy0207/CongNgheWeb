<?php
session_start();

// Tạo thư mục 'uploads' nếu chưa tồn tại
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $imagePath = '';

    // Kiểm tra và xử lý tệp tải lên
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Các loại tệp ảnh hợp lệ
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // Đặt tên tệp duy nhất để tránh ghi đè
            $newFileName = uniqid() . '.' . $fileExtension;
            $imagePath = 'uploads/' . $newFileName;

            // Di chuyển tệp vào thư mục 'uploads/'
            move_uploaded_file($fileTmpPath, $imagePath);
        } else {
            echo "Loại tệp không hợp lệ. Vui lòng tải lên tệp ảnh.";
        }
    }

    // Lưu thông tin hoa vào session nếu dữ liệu hợp lệ
    if (!empty($name) && !empty($description) && !empty($imagePath)) {
        if (!isset($_SESSION['flowers'])) {
            $_SESSION['flowers'] = [];
        }

        $_SESSION['flowers'][] = [
            'name' => $name,
            'description' => $description,
            'image' => $imagePath,
        ];
    }
}

// Lấy danh sách hoa từ Session
$flowers = $_SESSION['flowers'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
</head>
<body>
    <h1>Quản trị - Thêm loài hoa</h1>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <label for="name">Tên Hoa:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="description">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br><br>

        <label for="image">Chọn hình ảnh:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br><br>

        <button type="submit">Thêm Hoa</button>
    </form>

    <h2>Danh sách các loài hoa đã thêm</h2>
    <?php if (!empty($flowers)): ?>
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-card">
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
                <div>
                    <h3><?php echo $flower['name']; ?></h3>
                    <p><?php echo $flower['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Chưa có loài hoa nào được thêm!</p>
    <?php endif; ?>

    <p><a href="index.php">Xem danh sách hoa ngoài trang chủ</a></p>
</html>
