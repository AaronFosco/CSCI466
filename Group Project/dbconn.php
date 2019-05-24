<?php
   $host = 'students';
   $user = '------';
   $password = '------';
   $db = '------';
   
   $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$password);
   try
   {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   }
   catch(PDOException $e)
   {
      echo 'ERROR:'.$e->getMessage();
   }
?>
