<?php

require_once 'autoload.php';

if ( !$auth->isLoged() ) {
	header('location: login.php');
}

	$pageTitle = "Mi pefil";
	include "partials/head.php";
	$theUser = $db->getUserByEmail($_SESSION['userEmail']);

	
?>
<body>
		<?php require_once "partials/header-nav.php"; ?>
			<container class=container-user-profile>
					<div class="container-profile-img">
						<img  class=user-profile-image
						src="data/avatars/<?= $theUser->getImage() ?>" alt="" >
					</div>
						<br>
					<div class="container-profile-data">
						<h2 class=user-name><?= $theUser->getName() ?></h2>
						<br>
						<h3 class=user-data><?= $theUser->getEmail() ?></h3>

						<section class="user-profile-options">
						<p><a	href="#"></a> Mis compras</p>
						<p><a	href="#"></a> Wishlist</p>
					</section>
				</div>
			</container>
	<?php require_once "partials/footer.php"; ?>
</html>
