<?php
$questionnaires = $bdd->prepare("SELECT * FROM questionnaire 
							        WHERE questionnaire.id_user=:id_this_user");
$questionnaires->execute(array('id_this_user' =>$id_user));
$questionnaire = $questionnaires->fetchAll(PDO::FETCH_ASSOC);
?>