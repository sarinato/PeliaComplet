<?php
$controles = $bdd->prepare("SELECT * FROM conntroles_medecin 
JOIN medecin
    ON conntroles_medecin.id_medecin = medecin.id_medecin  
WHERE conntroles_medecin.id_user=:id_this_user");
$controles->execute(array('id_this_user' =>$id_user));
$controle = $controles->fetchAll(PDO::FETCH_ASSOC);
?>