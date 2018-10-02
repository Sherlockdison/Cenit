<?php
	$pageTitle = "Mi pefil";
	include "partials/head.php";
?>
	<body>
			<?php require_once "partials/header-nav.php"; ?>

   			<!-- Partial login.php-->
  		<div class="container-page">

  			<div class="container-img">
   						<img src="images/page-img/aquarium-01.jpg"	class="page-img">
  			</div>
  			<div class="container-form">
  		  	<form>
  					<h2>Logueate</h2>
  			    	<label for="uName"><b>Nombre de Usuario</b></label>
  						<br>
  			    	<input type="text" placeholder="Ingresa tu nombre de usuario" name="uName" required>
  							<br>
  							<br>
  							<br>
  			  	  <label for="psw"><b>Contraseña</b></label>
  						<br>
  			   	 	<input type="password" placeholder= "Ingresa tu contraseña" name="psw" required>
  							<br>
  							<br>
  							<br>
  						<label>
  							<input type="checkbox" checked="checked" name="remember"> Recordarme
  						</label>
  								<br>
  								<br>
  								<br>
  						<button type="button" class="cancelbtn">Cancel</button>
  			   		<button type="submit">Ingresar</button>
  							<br>
  							<br>
  							<br>
  							<span class="psw">Olvidaste tu <a href="#">Contraseña?</a></span>
  		  		</form>
  			</div>
  		</div>
      <?php require_once "partials/footer.php"; ?>

	</html>
