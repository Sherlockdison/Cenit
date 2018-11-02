<?php
require_once 'autoload.php';
require_once 'connection.php';

$json_To_SQL= (

     $json = file_get_contents('data/users.json');
     $obj = json_decode($data,true);

     //Database Connection
    require_once 'DBJson.php';
    require_once 'DBMysql.php';

     /* insert data into DB */
        foreach($obj as $item) {
           mysql_query(INSERT INTO users (name, email, password, country, image)
           VALUES ('name'.$item['name'], 'email'.$item['email'], 'password'.$item['password'],
             'country'.$item['country'],'image'.$item['image'],
         }
       )));
