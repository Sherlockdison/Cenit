<?php
	require_once 'FormValidator.php';

	class LoginFormValidator extends FormValidator
	{
		private $email;
		private $password;

		public function __construct($post)
		{
			$this->email = isset($post['email']) ?  $post['email'] : '';
			$this->password = isset($post['password']) ?  $post['password'] : '';
		}

		public function isValid()
		{
			if ( empty($this->email) ) {
				$this->addError('email', 'Escribí tu correo electrónico');
			} else if ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ) {
				$this->addError('email', 'Escribí un correo válido');
			}

			if ( empty($this->password) ) {
				$this->addError('password', 'La contraseña no puede estar vacía');
			}

			return empty($this->getAllErrors());
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function getPassword()
		{
			return $this->password;
		}
	}
