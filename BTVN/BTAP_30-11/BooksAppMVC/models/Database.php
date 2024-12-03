<?php

class Database
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '123456';
    private $dbname = 'BooksManagementSystem2';
    public $conn;

    public function connect()
    {
        // Tạo kết nối
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die('<p style="color: red;">Kết nối thất bại: ' . $this->conn->connect_error . '</p>');
        } 

        return $this->conn;
    }
}


?>
