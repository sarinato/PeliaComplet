<?php
 session_start();
 require("../config/connect.php");
 $id_user = $_SESSION['id'];
 $dataResult = array();
 $error = false;

 $frequenceJ1 = '';
 $doseFreq1 = '';
 $frequenceJ2 = '';
 $doseFreq2 = '';
 $frequenceJ3 = '';
 $doseFreq3 = '';
 $frequenceJ4 = '';
 $doseFreq4 = '';





 $frequenceJ1 = $_POST["frequenceJ1"];
 $doseFreq1 = $_POST["doseFreq1"];
if(isset($_POST["frequenceJ2"])){
 $frequenceJ2 = $_POST["frequenceJ2"];
 $doseFreq2 = $_POST["doseFreq2"];
}
if(isset($_POST["frequenceJ3"])){

 $frequenceJ3 = $_POST["frequenceJ3"];
 $doseFreq3 = $_POST["doseFreq3"];
}
if(isset($_POST["frequenceJ4"])){

 $frequenceJ4 = $_POST["frequenceJ4"];
 $doseFreq4 = $_POST["doseFreq4"];
}
 
 if ($error == false){
        $requete_temps = $bdd->prepare("UPDATE temps_prises 
        SET f1= :f1, f2= :f2, f3= :f3, f4= :f4, dose_medicament1=:dos1, dose_medicament2=:dos2, dose_medicament3=:dos3, dose_medicament4=:dos4
        WHERE id_temps=:idTemps");
            $requete_temps->execute(array(
                'f1' => $frequenceJ1,
                'dos1' =>  $doseFreq1,
                'f2' => $frequenceJ2,
                'dos2' =>  $doseFreq2, 
                 'f3' => $frequenceJ3,
                'dos3' =>  $doseFreq3,  
                'f4' => $frequenceJ4,
                'dos4' =>  $doseFreq4,
                'idTemps' => $_POST["IDTemps"]

        ));

 }
 echo json_encode($dataResult);
 ?>