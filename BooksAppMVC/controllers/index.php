<?php
require_once 'BookController.php';

$controller = new BookController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        $controller->create();
    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $controller->edit($_GET['id']);
    } elseif ($action == 'delete' && isset($_GET['id'])) {
        echo "Đang thực hiện hành động xóa với ID: " . htmlspecialchars($_GET['id']);

        $controller->delete($_GET['id']);
    } else {
        $controller->index();
    }
} else {
    $controller->index(); 
}
?>
