<?php

	abstract class DB
	{
		// public abstract function getAllUsers();
		public abstract function emailExist($email);
		public abstract function getUserByEmail($email);
		public abstract function saveUser(User $user);
	}
