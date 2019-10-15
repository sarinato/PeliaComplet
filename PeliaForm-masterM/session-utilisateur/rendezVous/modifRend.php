   <?php 
     session_start();
     require("../config/connect.php");
     $id_user = $_SESSION['id'];
     header("Content-type:application/json;charset=utf-8");    
     $dataResult = array();
   ?>
   
   <?php

    $nom_conntroles=$_POST['nomRend'];
    $id_conntrole=$_POST['IDConntroles'];
    $date_conntroles=$_POST['dateRendez'];
    $heure_conntroles=$_POST['heuresRappel'];
    $heures_rappel=$_POST['timeControle'];
    $emplacement=$_POST['LocMed'];
    $remarque=$_POST['RemarqueMed'];

    $error = false;

    if(empty($nom_conntroles)){
        $dataResult["nom_conntroles"] = 1;
        $error = true;
    }
    if(empty($date_conntroles)){
        $dataResult["date_conntroles"] = 1;
        $error = true;
    }
    if(empty($heure_conntroles)){
        $dataResult["heure_conntroles"] = 1;
        $error = true;
    }
    if(empty($emplacement)){
        $dataResult["emplacement"] = 1;
        $error = true;
    }
    if(empty($remarque)){
        $dataResult["remarque"] = 1;
        $error = true;
    }
    if($error == false){
        $requette_medecin = $bdd->prepare(' UPDATE conntroles_medecin 
        SET  nom_conntroles= :nom_conntroles, date_conntroles= :date_conntroles, heure_conntroles= :heure_conntroles, rappel_conntroles = :rappel_conntroles,  emplacement= :emplacement, remarque= :remarque
        WHERE id_conntroles=:IDTemps');
        if($requette_medecin->execute(array(
            'nom_conntroles' => $nom_conntroles,
            'date_conntroles' => $date_conntroles,
            'heure_conntroles' => $heure_conntroles,     
            'rappel_conntroles' => $heures_rappel,
            'emplacement' => $emplacement,
            'remarque' => $remarque,
            'IDTemps' => $_POST["IDConntroles"]
        ))){
            $dataResult["success"] = 1;
            $dataResult["name"] = $nom_conntroles;
            $dataResult["date1"] = $date_conntroles;
            $dataResult["date2"] = $heure_conntroles;
            $dataResult["emplacement"] = $emplacement;
            $dataResult["rappel_conntroles"] = $heures_rappel;
            $dataResult["remarque"] = $remarque;
    }
    }
   
    echo json_encode($dataResult);

    ?>