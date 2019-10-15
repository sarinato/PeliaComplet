<?php
    session_start();
    require("../config/connect.php");
    header("Content-type:application/json;charset=utf-8");

    $dataResult = array();
    $nomMed = $_POST['nomMed'];
    $SpecMed = $_POST['SpecMed'];
    $numMed = $_POST['numMed'];
    $emailMed = $_POST['emailMed'];
    $adresseMed = $_POST['adresseMed'];
    $error = false;
    
    if(empty($nomMed)){
        $dataResult["nomMed"] = 1;
        $error = true;      
    }
    if(empty($SpecMed)){
        $dataResult["SpecMed"] = 1; 
        $error = true;       
    }
    if(empty($numMed)){
        $dataResult["numMed"] = 1;        
        $error = true;
    }
    if(empty($emailMed)){
        $dataResult["emailMed"] = 1; 
        $error = true;       
    }
    if(empty($adresseMed)){
        $dataResult["adresseMed"] = 1;
        $error = true;       
    }    

    $id_user = $_SESSION['id'];
    if ($error==false){
            // print_r($_POST);
            // echo "<br> ".$id_user;
            $nom_medecin=$_POST['nomMed'];
            $specialite=$_POST['SpecMed'];
            $numero_telephone=$_POST['numMed'];
            $email=$_POST['emailMed'];
            $adresse=$_POST['adresseMed'];

            $requete_Ajout_medecin = $bdd->prepare('INSERT INTO medecin(`id_user`, `nom_medecin`,`specialite_medecin`,`numero_telephone`, `email`,`adresse`) 
            VALUES(:id_user, :nom_medecin, :specialite, :numero_telephone,:email, :adresse)');
               if(
            $requete_Ajout_medecin->execute(array(
                    'id_user' => $id_user,
                    'nom_medecin' => $nom_medecin,
                    'specialite' => $specialite,
                    'numero_telephone' => $numero_telephone,
                    'email' => $email,
                    'adresse' => $adresse
            ))){
                $last_id_medecin = $bdd->lastInsertId();
                $dataResult["success"] = 1;
                $dataResult["nomMedecin"] = $nom_medecin;
                $dataResult["idMedecin"] = $last_id_medecin;
            }else{
                echo "none";
            }
    
        }

        echo json_encode($dataResult);
?>