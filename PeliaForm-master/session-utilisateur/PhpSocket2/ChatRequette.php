<?php 
        header("Content-type:application/json;charset=utf-8");
        require("../config/connect.php");
        $dataResult = array();
        // if(isset($_POST["submit"])){
            $communRoom= $_POST["roomCommun"];
            $nameRoom= $_POST["nameRoom"];
            $message= $_POST["message"];
            $id_seder = $_POST["id_seder"];
            // print_r($_POST);
            $getting_room_id = $bdd->prepare("SELECT * FROM `room`              
                    WHERE room_name =:communRoom AND id_seder=:seder");
$getting_room_id->execute(array('communRoom' =>$nameRoom,'seder'=>$id_seder));

$getting_room_ids = $getting_room_id->fetch(PDO::FETCH_ASSOC);
// print_r($getting_room_ids);


$user_room=$getting_room_ids['id_room'];
// echo $getting_room_ids;
        $requete_Ajout_message = $bdd->prepare('INSERT INTO `message`( `message`, `id_room`) 
            VALUES( :msg , :room)');               
            $requete_Ajout_message->execute(array(
                    'msg' => $message,
                    'room' => $user_room,                    
            ));
        // }
        $dataResult["success"] = 1;
        echo json_encode($dataResult);
        
?>                    
            