<?php
$id = $_GET['id'];
$url = "http://localhost/Hanutimes/api/get_all_comment_of_a_news.php?id=$id";

$tag = curl_init($url);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($tag);

$result = json_decode($response, true);

?>

<?php 
if ($result['message'] = 'No Comments Found') {
    print_r('No comment yet!');
} else {
foreach ($result as $key => $value) :
?>
        <li class="comment">
            <div class="vcard bio">
                <img src="images/01.jpg" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <p>'. $value['comment'] .'</p>
                <p><a href="#" class="reply">Delete</a></p>
            </div>
        </li>;
<?php 
endforeach; } ?>