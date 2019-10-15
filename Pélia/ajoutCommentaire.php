<?php
    require("../session-utilisateur/config/connect.php");
    header("Content-type:application/json;charset=utf-8");
    $dataResult = array();
    $error = false;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $article = $_POST['idArticle'];
    if( empty($name)){
        $dataResult['name'] = 100;                    
        $error = true;
    }
    if( empty($email)){
        $dataResult['email'] = 200;                    
        $error = true;
    }
    if( empty($message)){
        $dataResult['message'] = 300;                    
        $error = true;
    }
  
    if ($error==false){
        $requete_Ajout_medecin = $bdd->prepare('INSERT INTO commentaires_article(`id_details_article`,`date_creation`,`contenue_commentaire`, `name`,`email_comment`) 
        VALUES(:id_details_article, NOW(), :contenue_commentaire,:name, :email_comment)');
           if(
        $requete_Ajout_medecin->execute(array(
                'id_details_article' => $article,
                'contenue_commentaire' => $message,
                'name' =>  $name,
                'email_comment' => $email
        ))){
            $dataResult["success"] = 1;
        }else{
            $dataResult["success"] = 0;
        }
    }


    echo json_encode($dataResult);
?>