<?php
session_start();
include 'crypt.php';
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=pelia;charset=utf8', 'root', '');
  
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

header("Content-type:application/json;charset=utf-8");


$email = $_POST['email'];
$password = $_POST['password'];
$type="patient";

$password = crypte($password);

// $hash = password_hash($password, PASSWORD_DEFAULT);
$error = false;


            $dataResult = array();

            if(empty($email) || empty($password)){
                $dataResult['empty'] = 4;                    
                $error = true;
            }
            

        // sending Data to the database after confirming that thers no error
        
        
            if(!empty($email) && !empty($password) && $error==false){    
                $result = $bdd->prepare("SELECT * FROM users WHERE email = :email OR phone = :email and Type = :type");   
                $result->execute(array(':email' =>$email, ':type' => $type));
                $users = $result->fetch(PDO::FETCH_ASSOC);

                if (isset($users['phone']) ){
                    if ($password == $users['password']){
                         
                        $_SESSION['peliaSafetyConnection'] = 'motDePass';
                        $_SESSION['nom'] = $users['nom'];
                        $_SESSION['pwd'] = $users['password'];
                        $_SESSION['prenom']=$users['prenom'];
                        $_SESSION['id']=$users['id'];
                        $dataResult['verified'] = 10;
                        // header("location: ../session-utilisateur/index.php");                     
                    } 
                    else {
                        $dataResult['notVerified'] = 20;                        
                    }                   
                } 
                else {
                    $dataResult['wrongEmail'] =30;
                }
        }
        echo json_encode($dataResult);
        

?>