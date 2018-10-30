<?php

//archivo con funciones de configuracion
	require_once 'autoload.php';

//Redirigimos al profile si esta loggeado
	if( $auth->isLoged() ) {
		header('location: profile.php');
	}

	$pageTitle = "Logueate";
	include "partials/head.php";

//instanciamos un nuevo objeto de validacion del login
	$LoginData = new LoginFormValidator($_POST);

	if ($_POST) {

			if ( $LoginData->isValid() ) {

				$user = $db->getUserByEmail($_POST['email']);

								if ( !$user ) {
									$LoginData->addError('email', 'Este correo no está registrado');
								} else if ( !password_verify($_POST['password'], $user->getPassword()) ) {
											$LoginData->addError('password', 'Las credenciales no son validas');
								} else {
								if ( isset($_POST['rememberUser']) ) {
										setcookie('rememberUser', $_POST['email'], time() + 36000);
									}
									$auth->logIn($user->getEmail());
													}
				}
	}
?>
<?php require_once "partials/header-nav.php"; ?>

	<body>
		<div class="container-page">

				<!-- side Image -->
	  			<div class="container-img">
	   						<img src="images/page-img/aquarium-01.jpg"	class="page-img">
	  			</div>
				<!-- End side Image -->

				<!-- Login-Form -->
					<div class="container-form">
						<h2>Logueate</h2>
						<?php if ( $LoginData->getAllErrors() ) : ?>
							<div class="alertDanger">
								<ul>
									<?php foreach ($LoginData->getAllErrors() as $error) : ?>
										<li> <?= $error ?> </li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

		  		<form method="post">
			    	<label><b>Email</b></label>
						<br>
			    	<input
						type="text"
						placeholder="Ingresa tu nombre de usuario"
						name="email" required
						class= "formInput <?= $LoginData->fieldHasError('email') ? 'is-invalid' : ''; ?>"
						value="<?= $LoginData->getEmail(); ?>"
						>
						<?php if ( $LoginData->fieldHasError('email') ): ?>
							<div class="invalidInput">
								<?= $LoginData->getFieldError('email') ?>
							</div>
						<?php endif; ?>
							<br>
							<br>
							<br>
			  	  <label for="psw"><b>Contraseña</b></label>
						<br>
			   	 	<input
						type="password"
						placeholder= "Ingresa tu contraseña"
						name="password" required
						class= "formInput <?= $LoginData->fieldHasError('password') ? 'is-invalid' : ''; ?>"
						>
					<?php if ( $LoginData->fieldHasError('password') ): ?>
						<div class="invalidInput">
							<?= $LoginData->getFieldError('password') ?>
						</div>
					<?php endif; ?>
							<br>
							<br>
						<label class="checkboxContainer">
							<input class= "formCheckbox" type="checkbox" checked="checked" name="remember"> Recordarme
						</label>
								<br>
								<br>
								<br>
						<button type="button" class="cancelBtn">Cancel</button>
			   		<button type="submit" class="signupBtn" >Ingresar</button>
							<br>
							<br>
							<br>
							<span class="psw">Olvidaste tu <a href="#">Contraseña?</a></span>
		  		</form>
			</div>
		</div>
				<!-- //Login-Form -->
</body>
  <?php require_once "partials/footer.php"; ?>
</html>
