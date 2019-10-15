<?php
 session_start();
 require("../config/connect.php");
 header("Content-type:application/json;charset=utf-8");

    $dataResult = array();
    $NumeroMedecin = $_POST['NumeroMedecin'];
    $emailMedecin = $_POST['emailMedecin'];
    $adresseMedecin = $_POST['adresseMedecin'];
    $error = false;
    if(empty($NumeroMedecin)){
        $dataResult['NumeroMedecin'] = 1;
        $error = true;
    }
    if(empty($emailMedecin)){
        $dataResult['emailMedecin'] = 1;
        $error = true;
    }
    if(empty($adresseMedecin)){
        $dataResult['adresseMedecin'] = 1;
        $error = true;
    }
 $id_user = $_SESSION['id'];
 if ($error ==false){
    $requette_medecin = $bdd->prepare('  UPDATE medecin 
    SET numero_telephone= :numero,email= :email,adresse= :adresse
    WHERE id_medecin=:idMedecin');
    if( $requette_medecin->execute(array(
            'numero' => $_POST["NumeroMedecin"],
            'email' => $_POST["emailMedecin"],
            'adresse' => $_POST["adresseMedecin"],
            'idMedecin' => $_POST["IDMedecin"]
    ))){
        $dataResult["success"] = 1;
        $dataResult["numero"] = $NumeroMedecin;
        $dataResult["email"] = $emailMedecin;
        $dataResult["adresse"] = $adresseMedecin;
    }
    
 }
 
    
 
 echo json_encode($dataResult);


?>