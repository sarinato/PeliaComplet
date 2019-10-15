<?php
    require("../session-utilisateur/config/connect.php");
    header("Content-type:application/json;charset=utf-8");
    $dataResult = array();
    $error = false;
    $email = $_POST['email'];
    if( empty($email)){
        $dataResult['email'] = 200;                    
        $error = true;
    }
    if ($error==false){
        $requete_Ajout_medecin = $bdd->prepare('INSERT INTO newsletter(`email`) 
        VALUES(:email)');
           if(
        $requete_Ajout_medecin->execute(array( 'email' => $email ))){
            $dataResult["success"] = 1;
        }else{
            $dataResult["success"] = 0;
        }
    }


    echo json_encode($dataResult);
?>