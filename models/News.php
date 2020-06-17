<?php
class News
{
  // DB stuff
  private $conn;
  private $table = 'news';

  // Post Properties
  public $id;
  public $title;
  public $short_intro;
  public $created_date;
  public $pic;
  public $author;
  public $content;
  public $cat_id;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Posts
  public function read()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table. ' ORDER BY created_date DESC LIMIT 5 OFFSET 0';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single Post
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 1';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->title = $row['title'];
    $this->content = $row['content'];
    $this->short_intro= $row['short_intro'];
    $this->created_date= $row['created_date'];
    $this->pic= $row['pic'];
    $this->author= $row['author'];
    $this->cat_id= $row['cat_id'];
  }

}
