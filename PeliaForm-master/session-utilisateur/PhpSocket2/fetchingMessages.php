<?php 
header("Content-type:application/json;charset=utf-8");
include("../config/verificationLogin.php");
require("../config/connect.php");
$dataResult = array();
$communRoom = $_POST['communRoom'];

$message = $bdd->prepare("SELECT id_seder,prenom,room.id_room,message,time FROM `message`                            
                            INNER JOIN `room`
                            ON message.id_room = room.id_room
                            INNER JOIN `users`
                            ON room.id_seder = users.id                           
                    WHERE room.room_name =:communRoom
                    ORDER BY time ASC;");
$message->execute(array('communRoom' =>$communRoom));
$messages = $message->fetchAll(PDO::FETCH_ASSOC);
//  print_r($messages);
$i=0;

foreach($messages as $mssg){
    // print_r($mssg);
    $dataResult["$i"] = $mssg;    
    $i++;
}
// $dataResult["room"] = "34";


echo json_encode($dataResult);

?>