<?php
require_once '../models/BookModel.php';

class BookController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $books = $this->bookModel->getAllBooks();
        require '../views/books/index.php';

    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Lấy thông tin từ form
            $title = $_POST['title'];
            $publishedYear = $_POST['published_year'];
            $genre = $_POST['genre'];

            // Thêm sách vào CSDL
            if ($this->bookModel->insert($title, $publishedYear, $genre)) {
                header('Location: ../views/books/index.php'); // Chuyển hướng về danh sách sách
                exit; // Đảm bảo không có mã nào khác được thực thi
            } else {
                echo "Thêm sách không thành công.";
            }
        }

    }

    public function edit($id)
    {
        $book = $this->bookModel->getBookById($id);

        // Kiểm tra sách có tồn tại hay không
        if (!$book) {
            die("Sách không tồn tại!"); // Dừng lại nếu sách không tồn tại
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'], $_POST['published_year'], $_POST['genre'])) {
            $title = $_POST['title'];
            $publishedYear = $_POST['published_year'];
            $genre = $_POST['genre'];
            $this->bookModel->update($id, $title, $publishedYear, $genre);
            header('Location: ../views/books/index.php'); // Chuyển hướng về danh sách sách
        }
        require '../views/books/edit.php';
    }

    public function delete($id)
    {
        $this->bookModel->deleteBook($id);
        header('Location: ../views/books/index.php'); // Chuyển hướng về danh sách sách
        echo "ID để xóa: " . htmlspecialchars($id);

    }

}

?>