<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/News.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $news = new News($db);

  // Blog post query
  $result = $news->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      
      $post_item = array(
        'id' => $id,
        'title' => $title,
        'content' => html_entity_decode($content),
        'created_date' => html_entity_decode($created_date),
        'pic' => html_entity_decode($pic),
        'author' => html_entity_decode($author),
        'cat_id' => html_entity_decode($cat_id)
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No News Found')
    );
  }
