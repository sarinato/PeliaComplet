<?php
$medic_user = $bdd->prepare("SELECT * FROM temps_prises 
							JOIN medecin
								ON temps_prises.id_medecin = medecin.id_medecin  
							JOIN medicaments
								ON temps_prises.id_medicament = medicaments.id_medicament
								WHERE medecin.id_user=:id_this_user");
$medic_user->execute(array('id_this_user' =>$id_user));							
$medi_this_user = $medic_user->fetchAll(PDO::FETCH_ASSOC);
?>
