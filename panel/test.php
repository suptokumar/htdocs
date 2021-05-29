<?php
  try{
    $db = new PDO('sqlite:game_PDO.sqlite');
    
  }catch(PDOException $e){
      echo $e->getMessage();
  }
?>