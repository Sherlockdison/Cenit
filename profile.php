<?php
	require_once 'register-controller.php';

	if ( !isLogged() ) {
		header('location: login.php');
		exit;
	}

	$pageTitle = "Mi pefil";
	include "partials/head.php";
	$theUser = $_SESSION['user'];
?>
<body>
		<?php require_once "partials/header-nav.php"; ?>
			<container class=container-user-profile>
					<div class="container-profile-img">
						<img  class=user-profile-image src="data/avatars/<?= $theUser['avatar'] ?>" >
					</div>
						<br>
					<div class="container-profile-data">
						<h2 class=user-name><?= $theUser['name'] ?></h2>

						<section class="user-profile-options">
						<p><a	href="#"></a> Mis compras</p>
						<p><a	href="#"></a> Wishlist</p>
					</section>
				</div>
			</container>




	<?php require_once "partials/footer.php"; ?>
</html>
