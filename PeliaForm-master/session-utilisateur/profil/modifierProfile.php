
<?php
 session_start();
 require("../config/connect.php");
 $id_user = $_SESSION['id'];
 $error = false;
 $dataResult = array();

                $prenom = $_POST["PrenomUtilisateur"];
                $nom = $_POST["NomUtilisateur"];
                $age = $_POST["AgeUtilisateur"];
                $email = $_POST["EmailUtilisateur"];                 
                $phone = $_POST["NumUtilisateur"]; 
                $sex = $_POST["SexeUtilisateur"];

 if(empty($prenom)){
     $dataResult["prenom"] =1;
     $error = true;
 }
 if(empty($nom)){
    $dataResult["nom"] =1;
    $error = true;
}
if(empty($age) || $age = "0"){
    $dataResult["age"] =1;
    $error = true;
}
if(empty($email)){
    $dataResult["email"] =1;
    $error = true;
}
if(empty($phone)){
    $dataResult["phone"] =1;
    $error = true;
}
if(empty($sex)){
    $dataResult["sex"] =1;
    $error = true;
} 

 if ($error==false){
    
    $dataResult['success'] = 1;
    if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
        $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

        if(in_array($extensionUpload, $extensionsValides)) {
            $nameuploaded = $_FILES['photo']['name'];
            $titlePhoto = strtolower(substr($nameuploaded, 0));
            $photo = strtolower(str_replace(" ","",$titlePhoto));    
            $chemin="img/utilisateurs/". $photo;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
            $dataResult['profilPic'] = $chemin;
        }
        $requete_temps = $bdd->prepare("UPDATE users 
        SET prenom=:prenom, nom= :nom, email= :email, phone= :phone, sex= :sex, age=:age, photo_utilisateur=:photoUtilisateur
        WHERE id=:id_this_user");
            $requete_temps->execute(array(
                'prenom' => $_POST["PrenomUtilisateur"],
                'nom' => $_POST["NomUtilisateur"],
                'age' => $_POST["AgeUtilisateur"],
                'email' => $_POST["EmailUtilisateur"],
                'photoUtilisateur' => $photo, 
                 'phone' => $_POST["NumUtilisateur"], 
                'sex' => $_POST["SexeUtilisateur"],
                'id_this_user' => $id_user
        ));

    }
    else{
        $requete_temps = $bdd->prepare("UPDATE users 
        SET prenom=:prenom, nom= :nom, email= :email, phone= :phone, sex= :sex, age=:age
        WHERE id=:id_this_user");
            $requete_temps->execute(array(
                'prenom' => $_POST["PrenomUtilisateur"],
                'nom' => $_POST["NomUtilisateur"],
                'age' => $_POST["AgeUtilisateur"],
                'email' => $_POST["EmailUtilisateur"],                
                 'phone' => $_POST["NumUtilisateur"], 
                'sex' => $_POST["SexeUtilisateur"],
                'id_this_user' => $id_user
        ));
    } 
        
 }
 echo json_encode($dataResult);