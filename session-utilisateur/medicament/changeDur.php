<?php
 session_start();
 require("../config/connect.php");
 $id_user = $_SESSION['id'];
 $error = false;
 $dataResult = array();
 $date = $_POST["interval_p"];

if(empty($date)){
    $dataResult['interval'] = 1;
    $error = true;   
}


 if ($error == false){
          
    $dataResult['intervalVal'] = $date;
    $requette_medecin = $bdd->prepare(' UPDATE temps_prises 
    SET date_fin= NOW()+INTERVAL :fin  DAY
    WHERE id_temps=:idTemps');
        $requette_medecin->execute(array( 'fin' => $date, 'idTemps' => $_POST["IDTemps"]));
 }

 echo json_encode($dataResult);

 ?>