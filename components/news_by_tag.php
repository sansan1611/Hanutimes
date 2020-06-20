<?php
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$id = $_GET['id'];
$url = "http://localhost/hanutimes/api/get_all_news_by_tags.php?id=$id&&page=$page";

$news = curl_init($url);
curl_setopt($news, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($news);

$result = json_decode($response, true);
//  var_dump($result);
?>

<?php foreach ($result as $key => $value) : ?>
    <div class="case">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                <a href='news_single.php?id=<?php echo $value['id']; ?>' class="img w-100 mb-3 mb-md-0" style="background-image: url('images/<?php echo $value['pic']; ?>.jpg');">
                </a>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                <div class="text w-100 pl-md-3">
                    <span class="subheading"><?php echo $value['author']; ?> </span>
                    <div class="meta">
                        <?php $date = explode('-', $value['created_date']); ?>
                        <?php
                        $day = $date[2];
                        $mos = date("F", mktime(0, 0, 0, $date[1], 10));
                        $yr = $date[0];
                        ?>

                        <p class="mb-1"><?php echo $mos . ' ' . $day . ', ' . $yr ?></p>
                    </div>
                    <h3 class="heading mb-3"><a href='news_single.php?id=<?php echo $value['news_id']; ?>'><?php echo $value['title']; ?></a></h3>
                    <p><?php echo $value['short_intro']; ?></p>
                    <p> <a href='news_single.php?id=<?php echo $value['news_id']; ?>' class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>



                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
                <li><a href="tag.php?page=<?php echo ($page - 1); ?>">&lt;</a></li>
                <?php for ($i = 1; $i <= $value['total_page']; $i++) { ?>
                    <li <?php if ($page == $i) echo "class='active'"; ?>>
                        <a href="tag.php?id=<?php echo $id; ?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li><a href="tag.php?id=<?php echo $id; ?>&&page=<?php echo ($page + 1); ?>">&gt;</a></li>

            </ul>
        </div>
    </div>
</div>