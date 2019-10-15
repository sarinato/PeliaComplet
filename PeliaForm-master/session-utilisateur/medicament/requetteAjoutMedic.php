<?php
 session_start();
 require("../config/connect.php");
$id_user = $_SESSION['id'];
// All the variables are here

    header("Content-type:application/json;charset=utf-8");
   $f1 = '';
   $d1 = '';
   $f2 = '';
   $d2 = '';
   $f3 = '';
   $d3 = '';
   $f4 = '';
   $d4 = '';
   $nomMedic = $_POST['nomMedic'];    
   $typeMedic = $_POST['typeMedic'];
   $finTraitement = ($_POST["limiter_seleted"] == 'limiter' ? $_POST['dureeTraitement'] : 99999);
   $permanant = $_POST['permanant'];
   $nombre_fois = $_POST['fDay'];
   $f1=$_POST['frequenceJ1'];
   $d1=$_POST['doseF1'];
   $f2=$_POST['frequenceJ2'];
   $d2=$_POST['doseF2'];
   $f3=$_POST['frequenceJ3'];
   $d3=$_POST['doseF3'];
   $f4=$_POST['frequenceJ4'];
   $d4=$_POST['doseF4'];
   $jours_selection = $_POST['jour_selectionne'];
   $anId2_seleted = $_POST['anId2_seleted'];
   $lundi = $_POST["lundi"];
   $mardi = $_POST["mardi"] ;
   $mercredi = $_POST["mercredi"] ;
   $jeudi = $_POST["jeudi"] ;
   $vendredi = $_POST["vendredi"];
   $samedi = $_POST["samedi"];
   $dimanche = $_POST["dimanche"];
   $interval = $_POST['interval_prise'];
   $typeJour = $_POST['typeJour'];
   $date_debut = $_POST['dateDebut'];
   $stockMedic = $_POST['stockMedic'];
   $error = false;
   $dataResult = array();

    // The Conditions:

    // echo $nombre_fois;
    if(empty($nomMedic)){
        $dataResult['nomMedic'] = 1;                    
        $error = true;
    }
    if($typeMedic == "select"){
        $dataResult['typeMedic'] = 2;                    
        $error = true;
    }

    if($typeJour == 'all'){
        $dataResult['typeJour'] = 100;                    
        
    }
    if($typeJour == 'specifique'){        
        if($lundi == 'yes' || $mardi == 'yes' || $mercredi == 'yes' || $jeudi == 'yes' || $vendredi == 'yes' || $samedi == 'yes' || $dimanche == 'yes'){
            $dataResult['typeJour'] = 200;                    
        }
        else{
            $dataResult['typeJour'] = 202;
            $error = true;
        }
    }
    if($typeJour == 'interval'){
        if(empty($date_debut)){
            $dataResult['typeJour'] = 300;                    
            $error = true;
        }        
    }
   
    if($finTraitement == -1){
        $dataResult['finTraitement'] = 5;
        $error = true;     
    }    

    // Frequence
    $doses = [$f1,$d1,$f2,$d2,$f3,$d3,$f4,$d4];

    $nbr = intval($nombre_fois);
    
        for($i = 0;$i< $nbr*2; $i++){
            if(($doses[$i] == "")){            
                $dataResult['fDay'] = 4;
                $error = true;            
            }    
        } 
                                            
    if ($error == false){
        $select_medic = $bdd->prepare("SELECT id_medicament FROM medicaments WHERE nom_medicament = :medic AND type_medicament=:type_medic");   
        $select_medic->execute(array(
            ':medic' =>$_POST['nomMedic'],
            ':type_medic'=>$_POST['typeMedic']
        ));
        $id_medic1 = $select_medic->fetch(PDO::FETCH_ASSOC);
        $id_medic = $id_medic1['id_medicament'];
        $id_medecin = 0;
        // $finTraitement = (isset($_POST["limiter_seleted"])) ? $_POST['dureeTraitement'] : 99999;

        $f1=$_POST['frequenceJ1'];
        $d1=$_POST['doseF1'];

        $f2=$_POST['frequenceJ2'];
        $d2=$_POST['doseF2'];

        $f3=$_POST['frequenceJ3'];
        $d3=$_POST['doseF3'];

        $f4=$_POST['frequenceJ4'];
        $d4=$_POST['doseF4'];
       
        $requete_temps = $bdd->prepare('INSERT INTO temps_prises(`id_medicament`, `id_user`,`id_medecin`,`nombre_fois`, `f1`,`dose_medicament1`, `f2`,`dose_medicament2`, `f3`,`dose_medicament3`, `f4`,`dose_medicament4`,`date_insertion`,`date_fin`,`stock_medicament`) 
        VALUES(:id_medic, :id_user,:id_medecin,:nombre_fois, :f1,:dose_medicament1, :f2,:dose_medicament2, :f3,:dose_medicament3, :f4,:dose_medicament4,NOW(),NOW()+INTERVAL :fin  DAY, :stock_medicament)');
          if(  $requete_temps->execute(array(
                'id_medic' => $id_medic,
                'id_user' => $id_user,
                'id_medecin' => $id_medecin,
                'nombre_fois' => $nombre_fois,
                'f1' => $f1,
                'dose_medicament1' => $d1,
                'f2' => $f2,
                'dose_medicament2' => $d2,
                'f3' => $f3,
                'dose_medicament3' => $d3,
                'f4' => $f4,
                'dose_medicament4' => $d4,
                'fin' => $finTraitement,
                'stock_medicament'=>$stockMedic
        ))){ $id_temps = $bdd->lastInsertId();
            $dataResult['sent'] = 1;
        }

        $lu=$ma=$me=$je=$ve=$sa=$di=0;
  
        if($typeJour == "all" || $typeJour == "specifique") {
            $methode = 0;
            if($typeJour == "specifique"){
                if($lundi == 'yes'){$lu=1;} 
                if($mardi == 'yes'){$ma=1;}
                if($mercredi == 'yes'){$me=1;}
                if($jeudi == 'yes'){$je=1;}
                if($vendredi == 'yes'){$ve=1;}
                if($samedi == 'yes'){$sa=1;}
                if($dimanche == 'yes'){$di=1;} 
            }
            else{
                $lu=$ma=$me=$je=$ve=$sa=$di=1;
            }
            $requete_jours = $bdd->prepare("INSERT INTO jours_prises(`id_temps`, `methode`,`Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`,`Saturday`,`Sunday`) 
            VALUES(:id_temps, :methode,:lundi, :mardi, :mercredi, :jeudi, :vendredi,:samedi,:dimanche)");
            if($requete_jours->execute(array(
                'id_temps' => $id_temps,
                'methode' => $methode,
                'lundi' => $lu,
                'mardi' => $ma,
                'mercredi' => $me,
                'jeudi' => $je,
                'vendredi' => $ve,
                'samedi'=>$sa,
                'dimanche'=>$di
            ))){
            $dataResult['sent'] = 1;
        }else{$dataResult['sent'] = 0;$dataResult['error'] = 1;}
        }
        elseif($typeJour == "interval"){
            $methode = 1;
            $interval = $_POST['interval_prise'];
            $date_debut = $_POST['dateDebut'];
            $requete_jours = $bdd->prepare("INSERT INTO jours_prises(`id_temps`,`methode`, `date_debut`, `date_prise`) 
            VALUES(:id_temps, :methode,:datededebut ,:datededebut +INTERVAL :interval  DAY)");
            if($requete_jours->execute(array(
                'id_temps' => $id_temps,
                'methode' => $methode,
                'datededebut'=>$date_debut,
                'interval'=>$interval
            ))){$dataResult['sent'] = 1;}else{$dataResult['sent'] =0;$dataResult['error'] = 1;}
        }
    
    }
    else if($error == true){
        $dataResult['error'] = 1;
    }
    echo json_encode($dataResult);
    ?>
  