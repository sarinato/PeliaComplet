<?php
 session_start();
 require("../config/connect.php");
 header("Content-type:application/json;charset=utf-8");
    $id_user = $_SESSION['id'];
    
    $dataResult = array();
    

    $i=1;
    $t=0;
    $incrementation = $_POST["incrementation"];
   
    while($t < $incrementation){
        if(isset($_POST["selected_medic".$i])){
        $medic_afected =  $_POST['idMedAjout'.$i];
        $requete_temps = $bdd->prepare('  UPDATE temps_prises 
        SET id_medecin= :idMedecin
        WHERE id_temps=:idTemps');
            $requete_temps->execute(array(
                'idMedecin' => $_POST["idMedecin"],
                'idTemps' => $_POST["idTempsPrise".$i]
        ));
        }
        $i++;
        $t++;
    }
    
    $dataResult["success"] = 1;
    

 
 
    
 
 echo json_encode($dataResult);


?>