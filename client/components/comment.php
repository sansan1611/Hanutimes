<?php
$id = $_GET['id'];
$url = "http://localhost/Hanutimes/webservices/api/get_all_comment_of_a_news.php?id=$id";

$tag = curl_init($url);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($tag);

$result = json_decode($response, true);


?>

<?php 
if ($result['message'] != NULL) {
    echo $result['message'];
}
else {
foreach ($result as $key => $value) :
?>
        <li class="comment">
            <div class="vcard bio">
                <img src="images/comment/comment (<?php echo(rand(1,8));?>).jpg" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <h3><?php echo $value['name'] ?></h3>
                <p class="comment-content" ><?php echo $value['comment'] ?></p>
                <!-- <p><a href="#" class="reply">Delete</a></p> -->
            </div>
        </li>
<?php 
endforeach; } ?>