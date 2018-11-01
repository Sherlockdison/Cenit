<?php

require_once 'autoload.php';

if ( !$auth->isLoged() ) {
	header('location: login.php');
}

	$pageTitle = "Mi pefil";
	include "partials/head.php";

?>

<body>
		<?php require_once "partials/header-nav.php"; ?>
		<h1 class=user-name >Bienvenidx <?= $theUser->getName() ?></h1>
			<div class="allContainer">
					<div class="container-profile-img">
						<img  class=user-profile-image
						src="data/avatars/<?= $theUser->getImage() ?>" alt="" >
					</div>
					<div class="container-profile-data">
					<h3 class=user-data><?= $theUser->getEmail() ?></h3>

					<?php foreach (COUNTRIES as $code => $country): ?>

						<h3 class=user-data>
							<?= $code == $theUser->getCountry() ? "$country" : ""?> </h3>
						<?php endforeach; ?>
					</div>
				</div>
			<section class="user-profile-options">
				<p><a	href="#"></a> Mis compras</p>
				<p><a	href="#"></a> Wishlist</p>
			</section>
	<?php require_once "partials/footer.php"; ?>
</html>
