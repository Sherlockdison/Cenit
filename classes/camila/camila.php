<?php



if ( isLogged() ) {
  $theUser = getUserByEmail($_SESSION['user']['email']);
}
