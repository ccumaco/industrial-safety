<?php

if($_POST){

    //your email adress 
    $emailTo ="carloscumaco5@gmail.com"; //"yourmail@yoursite.com";

    //from email adress   
    // $fileName = 'newsletter.txt'; //set 777 permision for this file. 
    $emailSubject = "EPP industrial Safety";
    $error = false;
    
    $email = $_POST['email'];
    
    if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
        $error = true;
    
    
    //If all ok, save emali adress in file
    if($error == false){
        $message = "
        Alguien con el correo: $email desea obtener informacion.<br>";
      
      
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
        $headers .= "From: <EPP industrial safety>" . "\r\n";
        mail($emailTo, $emailSubject, $message, $headers);
        echo 'OK';
    }
}