<?php
		// llamar classes
	require_once 'autoload.php';

	// Titulo de la pagina y llamado a partials

	$pageTitle = "Mi pefil";
	include "partials/head.php";

  $FormData = new RegisterFormValidator($_POST, $_FILES);

		// preguntamos si el usuario esta logeado para saber si mostrar o no el profile.php del objeto auth

	if( $auth->isLoged() ) {
			header('location: profile.php');
		}

		if ($_POST) {

			if ( $FormData->isValid() ) {

				if ($db->emailExist($FormData->getEmail())) {
					$FormData->addError('email', 'Correo ya está registrado');
				} elseif ($db->userNameExist($FormData->getUserName())) {
					$FormData->addError('userName', 'Nombre de usuario ya registrado');
				}else {
					$imageName = SaveImage::uploadImage($_FILES['avatar']);

					$_POST['image'] = $imageName;
					$user = new User($_POST);
					$user->setId($db->generateId());

					$db->saveUser($user);

					$auth->logIn($user->getEmail());
				}
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
				   <form method="post" enctype="multipart/form-data">
		         <h2>Registrate</h2>
		         	<p>Por favor llena este formulario <br> para crear una cuenta.</p>

									<label><b>Nombre completo</b></label>

		 								 <input	type="text"	placeholder="Nombre completo"	name="name" class="formInput <?= $FormData->fieldHasError('name') ? 'invalidInputBorder' : ''; ?>"	value="<?=$FormData->getName(); ?>">

											<?php if(	$FormData->fieldHasError('name')): ?>
												<div class="invalidInput">
													<?= $FormData->getFieldError('name') ?>
												</div>
											<?php endif; ?>
												<br>

										 <label><b>Correo electrónico:</b></label>

											<input type="text" placeholder="Ingresar email" name="email" class="formInput <?= $FormData->fieldHasError('email') ? 'invalidInputBorder' : ''; ?>"	value="<?= $FormData->getEmail(); ?>">

												<?php if( $FormData->fieldHasError('email')): ?>
													<div class="invalidInput">
														<?= $FormData->getFieldError('email'); ?>
													</div>
												<?php endif; ?>

											<label><b>Nombre de usuario</b></label>

											<input type="text"	placeholder="Nombre de usuario" name="userName" class="formInput <?= $FormData->fieldHasError('userName') ? 'invalidInputBorder' : ''; ?>"
											value="<?= $FormData->getUserName(); ?>">

											<?php if ($FormData->fieldHasError('userName')): ?>
												<div class="invalidInput">
													<?= $FormData->getFieldError('userName') ?>
												</div>
											<?php endif; ?>


											<label><b>Password:</b></label>

											<input	type="password"	placeholder="Contraseña"	name="password"	class="formInput <?= $FormData->fieldHasError('password') ? 'invalidInputBorder' : ''; ?>">

											<?php if ($FormData->fieldHasError('password') ):?>
												<div class="invalidInput">
													<?= $FormData->getFieldError('password') ?>
												</div>
											<?php endif; ?>

											<br>

											<label><b>Repetir password:</b></label>

											<input type="password"	placeholder="Repetir password" name="rePassword" class="formInput <?= $FormData->fieldHasError('password') ? 'invalidInputBorder' : ''; ?>">

											<?php if ($FormData->fieldHasError('password')): ?>
												<div class="invalidInput">
													<?= $FormData->getFieldError('password') ?>
												</div>
											<?php endif; ?>

											<br>

											<label><b>País de nacimiento:</b></label>


											<select	name="country" class="formInput <?= $FormData->fieldHasError('country') ? 'invalidInputBorder' : ''; ?>">

												<option value="">Elegí un país</option>

													<?php foreach (COUNTRIES as $code => $country): ?>
														<option
															<?= $code == $FormData->getCountry() ? 'selected' : '' ?> value="<?= $code ?>">	<?= $country ?>
														</option>
													<?php endforeach; ?>
											</select>


											<?php if ($FormData->fieldHasError('country')): ?>
												<div class="invalidInput">
													<?= $FormData->getFieldError('country') ?>
												</div>
											<?php endif; ?>

											<br>

											<label><b>Imagen de perfil:</b></label>

												<div class="customFile">
													<input type="file" class="customFileInput" name="avatar">

												<label class="customFileLabel <?= $FormData->fieldHasError('avatar') ? 'invalidInputBorder' : ''; ?>">Elija el archivo...</label>
											</div>
												<?php if(
													$FormData->fieldHasError('avatar')
												): ?>
													<div class="invalidInput">
														<?= $FormData->getFieldError('avatar') ?>
													</div>
												<?php endif; ?>

										<p>Creando una cuenta aceptas nuestras <a href="#" style="color:dodgerblue">Politicas de privacidad</a>.</p>

				     <button type="button" class="cancelBtn">Cancelar</button>
				     <button type="submit" class="signupBtn">Registrarme</button>

				 	</form>
				 </div>
			 </div>
			 <?php require_once "partials/footer.php"; ?>
</html>
