<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hanutimes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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

    $urlC = "http://localhost/hanutimes/api/get_all_category.php";

	$category = curl_init($urlC);
	curl_setopt($category, CURLOPT_RETURNTRANSFER, true);
	$responseC = curl_exec($category);

	$resultC = json_decode($responseC, true);
	// var_dump($resultC);
    ?>
    <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hanu<i>times</i>.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Articles</a></li> -->
                    <li class="nav-item"><a href="template/about.html" class="nav-link">Team</a></li>
                    <li class="nav-item"><a href="template/contact.html" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('images/hanu.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <h2 class="subheading">Hello! Welcome to</h2>
                    <h1 class="mb-4 mb-md-0">Hanutimes</h1>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p>
                                <div class="mouse">
                                    <a href="#" class="mouse-icon">
                                        <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 sidebar pl-lg-5 ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <?php foreach ($resultC as $key => $value) : ?>
                                <li><a href="category.php?id=<?php echo $value['id'] ?>"><?php echo $value['category'] ?><span class="ion-ios-arrow-forward"></span></a></li>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9 ftco-animate">
                    <div class="col-md-12">
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
                                            <h3 class="heading mb-3"><a href='news_single.php?id=<?php echo $value['id']; ?>'><?php echo $value['title']; ?></a></h3>
                                            <p><?php echo $value['short_intro']; ?></p>
                                            <p> <a href='news_single.php?id=<?php echo $value['id']; ?>' class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>



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
												<a href="tag.php?id=<?php echo $id;?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
										<?php } ?>
										<li><a href="tag.php?id=<?php echo $id;?>&&page=<?php echo ($page + 1); ?>">&gt;</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">        
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>