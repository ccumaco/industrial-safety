<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="carloscumaco5@gmail.com"; //"yourmail@yoursite.com";

  //from email adress
  $emailFrom ="prueba@corre.com"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "EPP industrial Safety";

  $name = $_POST["name"];
  $email = $_POST["email"];
  $comment = $_POST["comment"];
  $phone = $_POST["phone"];
  if($name == "")
   $data['success'] = false;
 
 if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
   $data['success'] = false;


 if(strlen($comment) < 10 || strlen($comment) > 11)
   $data['success'] = false;

 if($comment == "")
   $data['success'] = false;

 if($data['success'] == true){

  $message = "Nombre: $name<br>
  Correo: $email<br>
  número: $email<br>
  Mensaje: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}