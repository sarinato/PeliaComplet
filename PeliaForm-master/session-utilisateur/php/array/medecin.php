<?php

$medecins = $bdd->prepare("SELECT * FROM medecin 
		WHERE medecin.id_user=:id_this_user");
$medecins->execute(array('id_this_user' =>$id_user));
$medecin = $medecins->fetchAll(PDO::FETCH_ASSOC);

?>