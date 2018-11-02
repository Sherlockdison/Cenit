<?php
require_once 'SaveImage.php';
require_once 'DB.php';
require_once 'User.php';
require_once 'connection.php';

class DBMySQL extends DB

	 {
    private $conn;
		private $database;
		private static $allUsers;

		public function __construct(Connection $connection)
		{
			$this->conn = $connection->getConnection();
		}


		public function getAllUsers()
		{
			$stmt = $this->conn->prepare("
				SELECT users.id, users.name, users.email
				FROM users
				ORDER BY name
			");
			$stmt->execute();
			return  $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getOneById($id)
		{
			$stmt = $this->conn->prepare("
				SELECT *, users.name
				FROM users
				WHERE users.id = :id
			");
			$stmt->bindValue(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

    public function getUserByEmail($email){
      $stmt = $this->conn->prepare("
        SELECT *, users.email
        FROM users
        WHERE users.email = :email
      ");
      $stmt->bindValue(":email", $email, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
      }

    public function emailExist($email){
      $emailExist = ($stmt = $this->conn->prepare("
      SELECT email
      FROM users
      WHERE EXISTS
      (SELECT email FROM users WHERE email LIKE $email);"));
      $stmt->bindValue(":email", $email, PDO::PARAM_STR);
      $stmt->execute();

      $emailExist == $oneUser->email ? true : false;
		}

		public function saveUser(User $user){
				   $userToSave->exportUserData();

				   $name = trim($data['name']);
				   $email = trim($data['email']);
				   $password = ($data['password']);
				   $country = ($data['country']);
				   $image = $finalName;

	   $insertStmt = $this->conn->prepare("
	     INSERT INTO users (
	       name,
	       email,
	       password,
	       country,
	       image,
	               )
	     VALUES (
	       :name,
	       :email,
	       :password,
	       :country,
	       :image,
	             )
	   ");

	   $insertStmt->bindValue(":name", $name, PDO::PARAM_STR);
	   $insertStmt->bindValue(":email", $email, PDO::PARAM_STR);
	   $insertStmt->bindValue(":password", $password, PDO::PARAM_STR);
	   $insertStmt->bindValue(":country", $rcountry, PDO::PARAM_STR);
	   $insertStmt->bindValue(":image", $image, PDO::PARAM_STR);
	   $insertStmt->execute();
	   return $this->conn->lastInsertId();
	 }}
