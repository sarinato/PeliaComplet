<?php
session_start();
// if(!(isset($_SESSION['login'])) && isset($_COOKIE['pseudo'])){
//   header ("Location: lockscreen.php");
// }
// else
if (!(isset($_SESSION['peliaSafetyConnection']) && $_SESSION['peliaSafetyConnection'] == 'motDePass')) {
header ("Location: ../../peliaForm-master/login.php");
}

?>

<?php
$id_user = $_SESSION['id'];
  // Destroy session after 5min of non activities

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 5 minutes ago
  if(session_destroy()){
    header ("Location: verificationLogin.php");
  }     // destroy session data in storage
}
else{
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
}

?>
