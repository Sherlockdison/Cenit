<?php
	//archivo con funciones de configuracion
	require_once 'register-controller.php';

	if ( isLogged() ) {
		header('location: profile.php');
			exit;
	}

	$pageTitle = "Logueate";
	include "partials/head.php";

	// Persistencia de email
	$userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';

	$errors = [];

	if ($_POST) {
		$errors = loginValidate($_POST);

		if ( count($errors) == 0) {
			$user = getUserByEmail($_POST['userEmail']);

			if( isset($_POST['rememberUser']) ) {
				setcookie('userLogged', $_POST['userEmail'], time() + 3600);
			}

			logIn($user);
		}
	}
?>

<?php require_once "partials/header-nav.php"; ?>

	<body>
		<div class="container-page">
	  			<div class="container-img">
	   						<img src="images/page-img/aquarium-01.jpg"	class="page-img">
	  			</div>
					<div class="container-form">
						<h2>Logueate</h2>
						<?php if ( $errors ): ?>
							<div class="alertDanger">
								<ul>
									<?php foreach ($errors as $error): ?>
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
						name="userEmail" required
						class= "formInput <?= isset($errors['email']) ? 'invalidInputBorder' : ''; ?>"
						value="<?= $userEmail; ?>">
						<?php if (isset($errors['email'])): ?>
							<div class="invalidInput">
								<?= $errors['email'] ?>
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
						name="userPassword" required
						class= "formInput <?= isset($errors['password']) ? 'invalidInputBorder' : ''; ?>"

					<?php if (isset($errors['password'])): ?>
						<div class="invalidInput">
							<?= $errors['password'] ?>
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
  <?php require_once "partials/footer.php"; ?>
</html>
