<?php

	class User
	{
		private $id;
		private $name;
		private $email;
		private $password;
		private $country;
		private $image;

		public function __construct($post)
		{
			$this->name = $post['name'];
			$this->email = $post['email'];
			$this->password = $post['password'];
			$this->country = $post['country'];
			$this->image = $post['image'];
		}

		public function setName($name)
		{
			$this->name = $name;
		}

		public function getName()
		{
			return $this->name;
		}

		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function setPassword($password)
		{
			$this->password = $password;
		}

		public function getCountry()
		{
			return $this->country;
		}

		public function setCountry($country)
		{
			$this->country = $country;
		}

		public function getImage() {
			return $this->image;
		}

		public function setImage($image)
		{
			$this->image = $image;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function hashPassword()
		{
			return password_hash($this->password, PASSWORD_DEFAULT);
		}

		public function exportUserData(){
			return [
				'id' => $this->id,
				'name' => $this->name,
				'email' => $this->email,
				'password' => $this->hashPassword($this->password),
				'country' => $this->country,
				'image' => $this->image,
			];
		}
	}
