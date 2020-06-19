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

	$url = "http://localhost/hanutimes/api/home.php?page=$page";

	$news = curl_init($url);
	curl_setopt($news, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($news);

	$result = json_decode($response, true);
	// var_dump($response);

	?>
	<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Hanu<i>times</i>.</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">Team</a></li>
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
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
							<li><a href="cine?id=1">Cine<span class="ion-ios-arrow-forward"></span></a></li>
							<li><a href="music?id=2">Music<span class="ion-ios-arrow-forward"></span></a></li>
							<li><a href="lifestyle?id=3">Lifestyle<span class="ion-ios-arrow-forward"></span></a></li>
							<li><a href="food?id=4">Food<span class="ion-ios-arrow-forward"></span></a></li>
						</div>
					</div>


				</div>

				<div class="col-lg-9 ftco-animate">
					<div class="col-md-12">
						<!-- <?php foreach ($result as $key => $value) : ?>
							<div class="row d-flex">
								<div class="col-md-6 d-flex ftco-animate">
									<div class="blog-entry justify-content-end">
										<a href='single.php?id=<?php echo $value['id']; ?>' class="block-20" style="background-image: url('images/<?php echo $value['pic']; ?>.jpg');">
										</a>
										<div class="text p-4 float-right d-block">
											<div class="topper d-flex align-items-center">
												<?php $date = explode('-', $value['created_date']); ?>
												<div class="one py-2 pl-3 pr-1 align-self-stretch">
													<span class="day"><?php echo $date[2] ?></span>
												</div>
												<div class="two pl-0 pr-3 py-2 align-self-stretch">
													<span class="yr"><?php echo $date[0] ?></span>
													<span class="mos"><?php echo date("F", mktime(0, 0, 0, $date[1], 10)) ?></span>
												</div>
											</div>
											<h7><?php echo $value['author']; ?> </h7>
											<h3 class="heading mb-3"><a href="#">
													<p><?php echo $value['short_intro']; ?></p>
												</a></h3>
											<p><?php echo $value['title']; ?></p>
											<p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
										</div>
									</div>
								</div>

							</div>
						<?php endforeach; ?> -->

						<!-- <div class="row d-flex">
							<div class="col-md-6 d-flex ftco-animate">
								<div class="blog-entry justify-content-end">
									<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
									</a>
									<div class="text p-4 float-right d-block">
										<div class="topper d-flex align-items-center">
											<div class="one py-2 pl-3 pr-1 align-self-stretch">
												<span class="day">18</span>
											</div>
											<div class="two pl-0 pr-3 py-2 align-self-stretch">
												<span class="yr">2019</span>
												<span class="mos">October</span>
											</div>
										</div>
									</div>
									<div class="text p-4 float-right d-block">
										<h7>Quynh Truong</h7>
										<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
										<p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 d-flex ftco-animate">
								<div class="blog-entry justify-content-end">
									<div class="text p-4 float-right d-block">
										<h7>Quynh Truong</h7>
										<h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
										<p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
									</div>
								</div>
							</div>
						</div> -->

						<?php foreach ($result as $key => $value) : ?>
							<div class="case">
								<div class="row">
									<div class="col-md-6 col-lg-6 col-xl-6 d-flex">
										<a href='single.php?id=<?php echo $value['id']; ?>' class="img w-100 mb-3 mb-md-0" style="background-image: url('images/<?php echo $value['pic']; ?>.jpg');">
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
											<h3 class="heading mb-3"><a href="blog-single.html"><?php echo $value['title']; ?></a></h3>
											<p><?php echo $value['short_intro']; ?></p>
											<p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>

											<!-- <ul class="media-social list-unstyled">
											<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
											</li>
											<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
											</li>
											<li class="ftco-animate"><a href="#"><span
														class="icon-instagram"></span></a></li>
										</ul> -->

										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>


						<div class="row mt-5">
							<div class="col text-center">
								<div class="block-27">
									<ul>
										<li><a href="index.php?page=<?php echo ($page - 1); ?>">&lt;</a></li>
										<?php for ($i = 1; $i <= $value['total_page']; $i++) { ?>
											<li <?php if ($page == $i) echo "class='active'"; ?>>
												<a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
										<?php } ?>
										<li><a href="index.php?page=<?php echo ($page + 1); ?>">&gt;</a></li>

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
			<!-- <div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="logo"><a href="#">Read<span>it</span>.</a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">latest News</h2>
						<div class="block-21 mb-4 d-flex">
							<a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
								</h3>
								<div class="meta">
									<div><a href="#"></span> Oct. 16, 2019</a></div>
									<div><a href="#"></span> Admin</a></div>
									<div><a href="#"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="img mr-4 rounded" style="background-image: url(images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
								</h3>
								<div class="meta">
									<div><a href="#"></span> Oct. 16, 2019</a></div>
									<div><a href="#"></span> Admin</a></div>
									<div><a href="#"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-1 d-block"><span
										class="ion-ios-arrow-forward mr-3"></span>Home</a></li>
							<li><a href="#" class="py-1 d-block"><span
										class="ion-ios-arrow-forward mr-3"></span>About</a></li>
							<li><a href="#" class="py-1 d-block"><span
										class="ion-ios-arrow-forward mr-3"></span>Articles</a></li>
							<li><a href="#" class="py-1 d-block"><span
										class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
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