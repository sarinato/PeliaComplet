<?php
$details_medicaments = $bdd->prepare("SELECT * FROM temps_prises 
INNER JOIN medicaments 
    ON temps_prises.id_medicament = medicaments.id_medicament
    INNER JOIN jours_prises 
    ON temps_prises.id_temps = jours_prises.id_temps");
    $details_medicaments->execute();
$details_medicament = $details_medicaments->fetchAll(PDO::FETCH_ASSOC);

?>