<?php 
    session_start();
    require("../config/connect.php");
    $id_user = $_SESSION['id'];
    header("Content-type:application/json;charset=utf-8");
    $error = false;
    $dataResult = array();
    // $Day = $_POST['jour_selectionne'];
    
    
    if(isset($_POST['jour_selectionne'])){
        $error = false;
      
    }
    else{
        $dataResult['day'] = 1;
        $error =true;
    }
    
   
    if($_POST['jour_selectionne'] == "interval") {
        $methode = 1;
        if(empty($_POST['dateDebut'])){
            $dataResult['dateDebut'] = 3;
            $error = false;

        }
    }
    if ($error == false){
        $jours_selection = $_POST['jour_selectionne'];
        $lundi=$mardi=$mercredi=$jeudi=$vendredi=$samedi=$dimanche=0;
        if($jours_selection == "all" || $jours_selection == "specifique") {
            $methode = 0;
          
            if($jours_selection == "all"){
                $lundi=$mardi=$mercredi=$jeudi=$vendredi=$samedi=$dimanche=1;
            }
            else{
                $lundi = (isset($_POST["lundi"])) ? 1 : 0;
                $mardi = (isset($_POST["mardi"])) ?  1 : 0;
                $mercredi = (isset($_POST["mercredi"])) ?  1 : 0;
                $jeudi = (isset($_POST["jeudi"])) ?  1 : 0;
                $vendredi = (isset($_POST["vendredi"])) ? 1 : 0;
                $samedi = (isset($_POST["samedi"])) ? 1 : 0;
                $dimanche = (isset($_POST["dimanche"])) ? 1 : 0;
            }
            $requette_medecin = $bdd->prepare('  UPDATE jours_prises 
        SET methode= :methode, Monday= :lundi, Tuesday= :mardi, Wednesday= :mercredi , Thursday= :jeudi , Friday= :vendredi,Saturday= :samedi, Sunday= :dimanche 
        WHERE id_temps=:IDTemps');
            $requette_medecin->execute(array(
                'methode' => $methode,
                'lundi' => $lundi,
                'mardi' => $mardi,
                'mercredi' => $mercredi,
                'jeudi' => $jeudi,
                'vendredi' => $vendredi,
                'samedi'=>$samedi,
                'dimanche'=>$dimanche,
                'IDTemps' => $_POST['IDTemps']
            ));
        } elseif($jours_selection == "interval") {
            $methode = 1;
            $interval = $_POST['interval_prise'];
            $date_debut = $_POST['dateDebut'];
            $requette_medecin = $bdd->prepare('  UPDATE jours_prises 
            SET methode= :methode,date_debut= :datededebut, date_prise= :datededebut +INTERVAL :interval  DAY
            WHERE id_temps=:IDTemps');
                $requette_medecin->execute(array(
                    'methode' => $methode,
                    'datededebut' => $date_debut,
                    'interval' => $interval = $_POST['interval_prise'],
                    'IDTemps' => $_POST["IDTemps"]
            ));
        }
       
     }
 echo json_encode($dataResult);
?>