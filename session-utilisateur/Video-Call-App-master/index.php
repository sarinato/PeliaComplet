<!--
 * @fileName index.html
 * @author Amir <amirsanni@gmail.com>
 * @date 22-Dec-2016
 *
-->
<?php 
    include("../config/verificationLogin.php");
    require("../config/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pelia Chat</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/img/pelia.png">

        <!-- favicon ends -->
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <style>
            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: block;
                font-size: 16px;
                cursor: pointer;
                margin: 0 auto;
            }
        </style>
        
        <script src="js/config.js"></script>
    </head>
    
    
    <body>
        <input type="button" id='createRoom' class="button" value="Create Room">
        
        <div id="roomLink" style="margin-top: 10px; text-align: center"></div>
        
        <!-- <script>
            var createBtn = document.querySelector("#createRoom");
            var linkInput = document.querySelector("#roomLink");

            createBtn.onclick = function(){
                new Promise(function(resolve, reject){
                    var room = Math.random().toString(36).slice(2).substring(0, 15);

                    return room ? resolve(room) : reject(new Error("Could not create room"));
                }).then(function(room){
                    var roomLink =appRoot+"comm.php?room="+room;
                    linkInput.innerHTML = '<a href="'+roomLink+'" target="_blank">Enter Room</a>';
                }).catch(function(err){
                    linkInput.innerHTML = err;
                });
            };
        </script> -->
    </body>
</html>