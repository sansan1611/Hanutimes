<?php
$id = $_GET['id'];
$url = "http://localhost/hanutimes/api/get_a_news.php?id=$id";

$news = curl_init($url);
curl_setopt($news, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($news);

$result = json_decode($response, true);

?>

<p class="mb-5">
    <img src="images/news-pics/pic (<?php echo $result['pic']; ?>).jpg" alt="" class="img-fluid">
</p>
<h6>
    <?php $date = explode('-', $result['created_date']);
    $day = $date[2];
    $mos = date("F", mktime(0, 0, 0, $date[1], 10));
    $yr = $date[0];
    echo $result['author'] . ' | ' . $mos . ' ' . $day . ', ' . $yr; ?></h6>
<h2 class="mb-3"><?php echo $result['title']; ?></h2>

<!-- phân tách thằng content, chưa xử lí được. Không tìm đc cách chia đoạn -->
<p class="news-content" style="color: #000; font-weight: 500;"><?php echo $result['short_intro'] ?></p>
<?php foreach ($result['content'] as $key => $value) : ?>
    <p class="news-content"><?php echo $value?></p>
<?php endforeach; ?>