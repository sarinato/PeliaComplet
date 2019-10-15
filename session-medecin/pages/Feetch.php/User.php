 <?php
 session_start();
 $users = $bdd->prepare("SELECT prenom FROM users
 
 WHERE room.id_geter = :id_us
");
