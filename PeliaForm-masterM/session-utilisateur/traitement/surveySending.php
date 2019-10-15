<?php
    session_start();
    require("../config/connect.php");
    header("Content-type:application/json;charset=utf-8");
    $dataResult = array();

    $premier=0;
    $deuxieme=0;
    $troixieme=0;
    $quatrieme=0;
    $error = false;
    $id_user = $_SESSION['id'];
    if ($error==false){
     $t= $_POST['BoucleJoures'] ;
     $dateQuestionnaire = $_POST['idDateQuestionaire'];
$i =0;
while($i<= $_POST['boucleMedicament']){
    $premier=0;
    $deuxieme=0;
    $troixieme=0;
    $quatrieme=0;
    if(!empty($_POST['surveillance'. $i .  "0". $t])){
        $premier=$_POST['surveillance'. $i .  "0". $t];
        }
        if(!empty($_POST['surveillance'. $i .  "1". $t])){
            $deuxieme=$_POST['surveillance'. $i .  "1". $t];
            }
    if(!empty($_POST['surveillance'. $i .  "2". $t])){
    $troixieme=$_POST['surveillance'. $i .  "2". $t];
    }
    if(!empty($_POST['surveillance'. $i .  "3". $t])){
        $quatrieme=$_POST['surveillance'. $i .  "3". $t];
        }
        $idMedicament = $_POST['idMedicament'.$i];
            $requete_Ajout_medecin = $bdd->prepare('INSERT INTO questionnaire(`id_user`, `id_temps`,`date_questionaire`,`prise1`, `prise2`,`prise3`,`prise4`) 
            VALUES(:id_user, :id_temps, :date_questionaire, :prise1,:prise2, :prise3, :prise4)');
               if(
            $requete_Ajout_medecin->execute(array(
                    'id_user' => $id_user,
                    'id_temps' => $idMedicament,
                    'date_questionaire' => $dateQuestionnaire,
                    'prise1' => $premier,
                    'prise2' => $deuxieme,
                    'prise3' => $troixieme,
                    'prise4' => $quatrieme
            ))){
                $dataResult["success"] = 1;
            }else{
                $dataResult["success"] = 0;
                
                $dataResult["user"] = $deuxieme; 
            }
            $i++;
        }
        }

        echo json_encode($dataResult);
   
?>