<?php

	$pageTitle = "Inicio";
	$bodyClass = "home";
	include "partials/head.php";
?>

<body class="body-index">
		<?php require_once "partials/header-nav.php"; ?>
			<div class="body-main">

				<article class="car-main">
					<img src="images/editorial/editorial-1-1.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-2-2.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-3-3.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-4-4.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-5-5.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-7-7.jpg">

				</article>

				<article class="car-main">
					<img src="images/editorial/editorial-8-8.jpg">

				</article>

			</div>

		<?php require_once "partials/footer.php"; ?>

			<script src="js/jquery-3.3.1.min.js"></script>
			<script>
				$(".toggle-nav").click(function () {
					$(".navbar-nav ul").slideToggle(350);
				});
		</script>
	</body>
</html>
