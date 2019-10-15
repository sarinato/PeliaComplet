

<?php
    session_start();
    require("../config/connect.php");
    $id_user = $_SESSION['id'];
    
    $dataResult = array();
    $error = false;
    
            $nom_conntroles=$_POST['nomRend'];
            $date_conntroles=$_POST['dateRendez'];
            $heure_conntroles=$_POST['timeRendez'];
            $rappel_conntroles=$_POST['heureRappel'];
            $emplacement=$_POST['LocMed'];
            $remarque=$_POST['RemarqueMed'];

            if(empty($nom_conntroles)){
                $dataResult["nom_conntroles"] = 1;
                $error = true;
            }
            if(empty($date_conntroles)){
                $dataResult["date_conntroles"] = 1;
                $error = true;
            }
            // if(empty($nom_conntroles)){
            //     $dataResult["nom_conntroles"] = 1;
            //     $error = true;
            // }
            if(empty($heure_conntroles)){
                $dataResult["heure_conntroles"] = 1;
                $error = true;
            }
            if(empty($rappel_conntroles)){
                $dataResult["rappel_conntroles"] = 1;
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
    
    
        if ($error == false){
            $dataResult['success'] = 1;
            $id_medecin = $_POST['medecinSelected'];            
            $nom_conntroles=$_POST['nomRend'];
            $date_conntroles=$_POST['dateRendez'];
            $heure_conntroles=$_POST['timeRendez'];
            $rappel_conntroles=$_POST['heureRappel'];
            $emplacement=$_POST['LocMed'];
            $remarque=$_POST['RemarqueMed'];
            if(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "30 minutes avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (30 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "1 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "2 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (2 * 60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "3 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (3 * 60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "4 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (4 * 60 * 60));
            }
            $requete_Ajout_medecin = $bdd->prepare('INSERT INTO conntroles_medecin(`id_user`,`id_medecin`, `nom_conntroles`,`date_conntroles`,`heure_conntroles`, `rappel_conntroles`,`emplacement`,`remarque`, `rappel_text`) 
            VALUES(:id_user,:id_medecin, :nom_conntroles, :date_conntroles, :heure_conntroles,:rappel_heure, :emplacement,:remarque,:rappel_conntroles)');
               if(
            $requete_Ajout_medecin->execute(array(
                    'id_user' => $id_user,
                    'id_medecin' => $id_medecin,
                    'nom_conntroles' => $nom_conntroles,
                    'date_conntroles' => $date_conntroles,
                    'heure_conntroles' => $heure_conntroles,
                    'rappel_conntroles' => $rappel_conntroles,
                    'emplacement' => $emplacement,
                    'remarque' => $remarque,
                    'rappel_heure'=>$rappel_heure
            ))){            
            }else{
                echo "None";
            }
    
        }
        echo json_encode($dataResult);

?>