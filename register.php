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
	require_once "partials/header-nav.php";

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
?>

<!-- Partial register.php-->
<body>
	 <div class="container-page">
   		<div class="container-img">
          <img src="images/page-img/leaves.jpg"	class="page-img">
  		</div>
			   <div class="container-form">
				   <form>
				         <h2>Registrate</h2>
				         <p>Por favor llena este formulario <br> para crear una cuenta.</p>
				         <br>
				         <label for="email"><b>Email</b></label>
				         <br>
				           <input type="text" placeholder="Enter Email" name="email" required>
				             <br>
				             <br>
				             <br>
				         <label for="psw"><b>Contraseña</b></label>
								  <br>
							   <input type="password" placeholder="Contraseña" name="psw" required>
				             <br>
				             <br>
				             <br>
				         <label for="psw-repeat"><b>Repetir contraseña</b></label>
				           <br>
				           <input type="password" placeholder="Repetir contraseña" name="psw-repeat" required>
				             <br>
				             <br>
				             <br>
							   <label>
							     <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Recordarme
							   </label>

					   <p>Creando una cuenta aceptas nuestras <a href="#" style="color:dodgerblue">Politicas de privacidad</a>.</p>

				     <button type="button" class="cancelbtn">Cancelar</button>
				     <button type="submit" class="signupbtn">Registrarme</button>

					 	</form>
				 </div>
			 </div>
		<?php require_once "partials/footer.php"; ?>
	</body>
</html>
