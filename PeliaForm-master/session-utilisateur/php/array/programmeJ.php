
<?php
$programme_journalier_controle = $bdd->prepare("SELECT * FROM conntroles_medecin 
							JOIN medecin
								ON conntroles_medecin.id_medecin = medecin.id_medecin  
		WHERE conntroles_medecin.id_user=:id_this_user AND conntroles_medecin.date_conntroles=:Aalerter");
$programme_journalier_controle->execute(array('id_this_user' =>$id_user,
'Aalerter' =>$today_date));

$controle_this_day = $programme_journalier_controle->fetchAll(PDO::FETCH_ASSOC);


$programme_journalier_medicament = $bdd->prepare("SELECT * FROM temps_prises 
	INNER JOIN medicaments 
		ON temps_prises.id_medicament = medicaments.id_medicament
		INNER JOIN jours_prises 
        ON temps_prises.id_temps = jours_prises.id_temps
        WHERE jours_prises.date_prise=:Aalerter OR jours_prises.$today=1");
        $programme_journalier_medicament->execute(array(
            'Aalerter' =>$today_date));
$jour = $programme_journalier_medicament->fetchAll(PDO::FETCH_ASSOC);
