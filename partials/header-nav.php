		<?php require_once 'register-controller.php'; ?>

	 <header class=header-container>
		 <section class=header-brand>
				<a class="navbar-brand" href="index.php"> <img src="images/logo.jpg" alt="logotipo"></a>
		 </section>

		<nav class="navbar-nav">

			<a href="#" class="toggle-nav"> </a>

			<ul>
				<li><a class="link-nav-" href="index.php">Inicio</a></li>
				<li><a class="link-nav" href="faq.php">Preguntas Frecuentes</a></li>
				<li><a class="link-nav" href="product-catalog.php">Tienda</a></li>
			</ul>
			<ul class="controlsUser">

				<?php if ( $auth->isLoged() ) : ?>
				<?php $theUser = $db->getUserByEmail($_SESSION['userEmail']); ?>

					<li><a class="nameUsNav"	href="profile.php">	<img class="imgNavProf" src="data/avatars/<?= $theUser->getImage() ?>">Hola<?= $theUser->getName() ?></a></li>
					<li><a href="logout.php">Logout	</a></li>

				<?php else : ?>

					<li><a href="login.php">Logueate</a></li>
					<li><a href="register.php">Registráte</a></li>
					<li	class="li-img"><a href="#"><img	class="shop-car"	src="images/bag.svg"	alt="shop-car"></a></li>
					
				<?php endif; ?>
			</ul>
    </nav>
</header>
