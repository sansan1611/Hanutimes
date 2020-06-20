<?php
$id = $_GET['id'];
$url = "http://localhost/Hanutimes/api/get_all_tags_of_a_news.php?id=$id";

$tag = curl_init($url);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($tag);

$result = json_decode($response, true);

?>

<div class="tagcloud">
    <?php foreach ($result as $key => $value) : ?>
        <a href="tag.php?id=<?php echo $value['id']; ?>" class="tag-cloud-link"><?php echo $value['tag'] ?></a>
    <?php endforeach; ?>
</div>