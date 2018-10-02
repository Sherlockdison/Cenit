<?php
		// controladores
	require_once 'register-controller.php';

		// preguntamos si el usuario esta logeado para saber si mostrar o no el profile.php
	if ( isLogged() ) {
		header('location: profile.php');
		exit;
	}
	// Titulo de la pagina y llamado a partials
	$pageTitle = "Mi pefil";
	include "partials/head.php";

	$countries = [
		'ar' => 'Argentina',
		'bo' => 'Bolivia',
		'br' => 'Brasil',
		'co' => 'Colombia',
		'cl' => 'Chile',
		'ec' => 'Ecuador',
		'pa' => 'Paraguay',
		'pe' => 'Perú',
		'uy' => 'Uruguay',
		've' => 'Venezuela',
	];

																			// Persistencia de datos

	$userFullName = isset($_POST['userFullName']) ? trim($_POST['userFullName']) : '';
	$userNickName = isset($_POST['userNickName']) ? trim($_POST['userNickName']) : '';
	$userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';
	$userCountry = isset($_POST['userCountry']) ? trim($_POST['userCountry']) : '';

	$errors = [];

	if ($_POST) {
		$errors = registerValidate($_POST, $_FILES);

		if ( count($errors) == 0 ) {

			$imageName = saveImage($_FILES['userAvatar']);

			$_POST['avatar'] = $imageName;

			$user = saveUser($_POST);

			logIn($user);
		}
	}


?>

<body>
	<?php require_once "partials/header-nav.php";  ?>
	 <div class="container-page">
		 <div class="container-img">
			 <img src="images/page-img/leaves.jpg"	class="page-img">
		 </div>
			   <div class="container-form" "register">
					 <?php if ( $errors ): ?>
						 <div class="alertDanger">
							 <ul>
								 <?php foreach ($errors as $error): ?>
									 <li> <?= $error ?> </li>
								 <?php endforeach; ?>
							 </ul>
						 </div>
					 <?php endif; ?>
				   <form method="post" enctype="multipart/form-data">
		         <h2>Registrate</h2>
		         	<p>Por favor llena este formulario <br> para crear una cuenta.</p>
		         		<br>
									<label><b>Nombre completo</b></label>
										<br>
		 								 <input
										 	type="text"
											placeholder="Nombre completo"
											name="userFullName"
											class="formInput <?= isset($errors['fullName']) ? 'is-invalid' : ''; ?>"
											value="<?= $userFullName; ?>"
											>
											<?php if (isset($errors['fullName'])): ?>
												<div class="invalid-feedback">
													<?= $errors['fullName'] ?>
												</div>
											<?php endif; ?>

											<br>
										 <label><b>Correo electrónico:</b></label>
										 <br>
											<input
												type="text"
												placeholder="Ingresar email"
												name="userEmail"
												class="formInput <?= isset($errors['email']) ? 'is-invalid' : ''; ?>"
												value="<?= $userEmail; ?>"
											>
												<?php if (isset($errors['email'])): ?>
													<div class="invalid-feedback">
														<?= $errors['email'] ?>
													</div>
												<?php endif; ?>
											<br>
											<label><b>Nombre de usuario</b></label>
											<br>
											<input
											type="text"
											placeholder="Nombre de usuario"
											name="userNickName"
											class="formInput <?= isset($errors['nickName']) ? 'is-invalid' : ''; ?>"
											value="<?= $userNickName; ?>"
											>
											<?php if (isset($errors['userName'])): ?>
												<div class="invalid-feedback">
													<?= $errors['userName'] ?>
												</div>
											<?php endif; ?>

											<br>
											<label><b>Password:</b></label>
											<br>
											<input
												type="password"
												placeholder="Contraseña"
												name="userPassword"
												class="formInput <?= isset($errors['password']) ? 'is-invalid' : ''; ?>"
											>
											<?php if (isset($errors['password'])): ?>
												<div class="invalid-feedback">
													<?= $errors['password'] ?>
												</div>
											<?php endif; ?>

											<br>
											<label><b>Repetir password:</b></label>
											<br>
											<input
												type="password"
												placeholder="Repetir password"
												name="userRePassword"
												class="formInput <?= isset($errors['password']) ? 'is-invalid' : ''; ?>"
											>
											<?php if (isset($errors['password'])): ?>
												<div class="invalid-feedback">
													<?= $errors['password'] ?>
												</div>
											<?php endif; ?>

											<br>
											<label><b>País de nacimiento:</b></label>
											<br>
											<select
												name="userCountry"
												class="custom-file <?= isset($errors['country']) ? 'is-invalid' : ''; ?>"
											>
												<option value="">Elegí un país</option>
												<br>
												<?php foreach ($countries as $code => $country): ?>
													<option
														<?= $code == $userCountry ? 'selected' : '' ?>
														value="<?= $code ?>"><?= $country ?></option>
												<?php endforeach; ?>
											</select>
											<?php if (isset($errors['country'])): ?>
												<div class="invalid-feedback">
													<?= $errors['country'] ?>
												</div>
											<?php endif; ?>

											<br>
											<label><b>Imagen de perfil:</b></label>
											<br>
											<div class="custom-file">
												<input
													type="file"
													class="custom-file-input <?= isset($errors['image']) ? 'is-invalid' : ''; ?>"
												 	name="userAvatar"
												>

												<label class="custom-file-label">Elija el archivo...</label>
												<?php if (isset($errors['image'])): ?>
													<div class="invalid-feedback">
														<?= $errors['image'] ?>
													</div>
												<?php endif; ?>
										</div>

										<p>Creando una cuenta aceptas nuestras <a href="#" style="color:dodgerblue">Politicas de privacidad</a>.</p>

				     <button type="button" class="cancelBtn">Cancelar</button>
				     <button type="submit" class="signupBtn">Registrarme</button>

				 	</form>
				 </div>
			 </div>
			 <?php require_once "partials/footer.php"; ?>
</html>
