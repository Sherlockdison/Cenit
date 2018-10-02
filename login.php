<?php
	// llamamos a las funciones controladoras
	require_once 'register-controller.php';

	if ( isLogged() ) {
		header('location: profile.php');
		exit;
	}

	$pageTitle = "Logueate";
	include "partials/head.php";

	// Persistencia de datos
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

   			<!-- Partial login.php-->

  		<div class="container-page">
				<?php if ( $errors ): ?>
					<div class="alert alert-danger">
						<ul>
						<?php foreach ($errors as $error): ?>
							<li> <?= $error ?> </li>
						<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

  			<div class="container-img">
   						<img src="images/page-img/aquarium-01.jpg"	class="page-img">
  			</div>
  			<div class="container-form">

					<h2>Logueate</h2>

  		  	<form method="post">

  			    	<label><b>Email</b></label>
  						<br>
  			    	<input
							type="text"
							placeholder="Ingresa tu nombre de usuario"
							name="userEmail" required
							class= "formInput"
							"form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>"
							value="<?= $userEmail; ?>">
							<?php if (isset($errors['email'])): ?>
								<div class="invalid-feedback">
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
							class= "formInput"
							"form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>"
						
						<?php if (isset($errors['password'])): ?>
							<div class="invalid-feedback">
								<?= $errors['password'] ?>
							</div>
						<?php endif; ?> >
  							<br>
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


		</body>
      <?php require_once "partials/footer.php"; ?>


	</html>
