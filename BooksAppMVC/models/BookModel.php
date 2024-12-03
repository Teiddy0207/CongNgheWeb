<?php

require_once 'Database.php';
class BookModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();

    }

    public function getAllBooks()
    {
        $query = "select * from Books";
        $result = $this->db->query($query);
       
        if (!$result) {
            die("Query Error: " . $this->db->error); // Kiểm tra lỗi trong truy vấn
        }
    
        return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function insert($title, $publishedYear, $genre)
    {
        $query = "INSERT INTO Books (Title, PublishedYear, Genre) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
    
        if ($stmt === false) {
            die("Prepare failed: " . $this->db->error); // Kiểm tra lỗi chuẩn bị câu truy vấn
        }
    
        $stmt->bind_param("sis", $title, $publishedYear, $genre);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error); // Kiểm tra lỗi khi thực hiện câu truy vấn
        }
        return true;
    }
    
    

    public function update($id, $title, $publishedYear, $genre)
    {
        $query = "UPDATE Books SET Title = ?, PublishedYear = ?, Genre = ? WHERE BookID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sisi", $title, $publishedYear, $genre, $id);
        return $stmt->execute();
    }

    public function deleteBook($id)
    {
        $query = "DELETE FROM Books WHERE BookID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getBookById($id)
{
    $query = "SELECT * FROM Books WHERE BookID = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


}



?>