<?php
    function crypte($password){
        $hashformat = "$2y$10$";
	    $salt = "iusesomecrazystrings22zefzef";
	    $hashF_Salt= $hashformat.$salt;
        $password = crypt($password, $hashF_Salt);
        return($password);
    }
    
?>