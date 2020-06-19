<?php
class Tag
{
  // DB stuff
  private $conn;
  //private $table_tag = 'tag';

  // Post Properties
  public $id;
  public $news_id;
  public $content;
  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read_all($id)
  {
    // Create query
    $query = "SELECT `tag`.`id`,`tag`.`content`  FROM `tag` 
          LEFT JOIN `tagnews` ON `tag`.`id` = `tagnews`.`tag_id` 
          RIGHT JOIN `news` ON `news`.`id` = `tagnews`.`news_id` 
          WHERE `news`.`id`=" . $id;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
}
