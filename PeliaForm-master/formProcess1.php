<?php
include "crypt.php";

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=pelia;charset=utf8', 'root', '');
  
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

header("Content-type:application/json;charset=utf-8");
$lastname = $_POST['lastname'];
$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$password = test_input($_POST['password']);
$cpassword = test_input($_POST['cpassword']);
$phone = test_input($_POST['phone']);
$sexe = test_input($_POST['sexe']);
$age = test_input($_POST['age']);
$type = "patient";

    $hash = crypte($password);
    $chash = crypte($cpassword);
    
    $nameTable = 'med_'.$phone;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  $emailExisted = false;
  $phoneExisted = false;
  $error = false;

  $result = $bdd->query('SELECT * FROM users where Type = "patient"');
  $fetched = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach ($fetched as $key) {
      if($email == $key['email']){
          $emailExisted = true;
      }
  }
  $result = $bdd->query('SELECT * FROM users where Type = "patient"');
  $fetched = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach ($fetched as $key) {
      if($phone == $key['phone']){
          $phoneExisted = true;
      }
  }
            $dataResult = array();
            
            
            if(empty($lastname) || empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($phone) || empty($sexe) || empty($age)){
                $dataResult['empty'] = 4;                    
                $error = true;
            }
            if($emailExisted){
                $dataResult['existedEmail'] = 1;                
                $error = true;
            }
            if($phoneExisted){
                $dataResult['existedPhone'] = 2;            
                $error = true;
            }
            if($password  !== $cpassword){
                $dataResult['password'] = 404;           
                $error = true;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $dataResult['unvalidEmail'] = 404;
                $error = true;
            }
            
              
            

        // sending Data to the database after confirming that thers no error
            
            if(!empty($lastname) && !empty($name) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($phone) && !empty($sexe) && !empty($age) && $error==false){
        
                $req = $bdd->prepare('INSERT INTO users(prenom, nom, email, password, cpassword, phone, sex, age, Type) VALUES(:lastname, :name, :email, :password, :cpassword, :phone, :sexe, :age, :type)');
                $san= $req->execute(array(
                    'lastname' => $lastname,
                    'name' => $name,
                    'email' => $email,
                    'password' => $hash,
                    'cpassword' => $chash,
                    'phone' => $phone,
                    'sexe' => $sexe,
                    'age' => $age,
                    'type' => $type  
                ));
               
                $msg = "Congrats!!!";
                $dataResult['code'] = 3;
                header("../PeliaForm-master/index.php")  ;  
        }
        echo json_encode($dataResult);
        

?>
<?php


?>