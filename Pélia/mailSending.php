<?php
 require("../session-utilisateur/config/connect.php");
 header("Content-type:application/json;charset=utf-8");
 $dataResult = array();
 $error = false;

    $nom =$_POST['name'];
    $email=$_POST['email'];
    $email = str_replace(' ', '', $email);
    $message=$_POST['message'];
    $message = $message .". L'email est envoyer par " . $email ;
        if(mail("ahmedkhachia17@gmail.com" ,$message,$nom)){
          $dataResult["success"] = 1;
     }else{
         $dataResult["success"] = 0;
     }
 echo json_encode($dataResult);

          
    ?>