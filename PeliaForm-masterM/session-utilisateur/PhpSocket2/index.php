<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
$session = mt_rand(1,999);

$room_selected= '';

	$room = $bdd->prepare("SELECT * FROM users 
		INNER JOIN room
		ON room.id_seder = users.id
		WHERE room.id_geter=:id_us");

$room->execute(array('id_us' =>$_SESSION["id"]));
$rooms = $room->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($rooms);
// echo "</pre>";
// ss
// $room_selected = $rooms['id_room'];
// echo $room_selected;


// FETCHING USERS

// $message = $bdd->query("SELECT * FROM message ");

// $messages = $message->fetchAll(PDO::FETCH_ASSOC);


// }

?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../assets/img/pelia.png" type="image/png">
        <script src="js/jquery.js" type="text/javascript"></script>
	
        <title>Chat</title>
        <?php
	include "../includes/link.php";
	?>
    
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/chat.css">
    </head>

    <body>

        <!--================ Start Header Menu Area =================-->
        <?php
	include "../includes/header.php";
	?>
            <!--================ End Header Menu Area =================-->
           <?php 
           include "../includes/head.php";
           ?>

	<div class="site-main container">
<div id="frame" class="">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="../assets/img/me.jpg" class="online" alt="" />
					<p>Ahmed Khachia Errahman</p>
					<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
					<div id="status-options">
						<ul>
							<li id="status-online" class="active"><span class="status-circle"></span>
								<p>Online</p>
							</li>
							<li id="status-away"><span class="status-circle"></span>
								<p>Away</p>
							</li>
							<li id="status-busy"><span class="status-circle"></span>
								<p>Busy</p>
							</li>
							<li id="status-offline"><span class="status-circle"></span>
								<p>Offline</p>
							</li>
						</ul>
					</div>
					<div id="expanded">
						<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="mikeross" />
						<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="ross81" />
						<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="mike.ross" />
					</div>
				</div>
			</div>
			<div id="search">
				<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
				<input type="text" placeholder="Search contacts..." />
			</div>
			<div id="contacts">
				<ul>
					
					<?php
					$i=0;
					foreach ($rooms as $use){
						?>
						<div style="display:flex; justify-content:space-between">
						<li class="contact active" id="<?php echo $use['room_name']; ?>" value="<?php echo $use['id_room']; ?>">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<!-- <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" /> -->
							<div class="meta">
								
								<p class="name" id="Remote"><?php echo $use["prenom"]; ?></p>

								<p class="preview"><?php echo $use["id"]; ?></p>
								
							</div>
						</div>
					</li>
					<a id="<?php echo $use['id_room']; ?>" class="videoChat" value="<?php echo $use['room_name']; ?>" name=" <?php echo $use['prenom']; ?>"><img src="https://img.icons8.com/wired/64/000000/video-call.png" width="40"></a>
					</div>
<?php
					}?>
					
					
				</ul>
			</div>
			<div id="bottom-bar">
				<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add
						contact</span></button>
				<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
			</div>
		</div>
		<div class="content">
			<div class="contact-profile">
				<img src="../assets/img/me.jpg" alt="" />
				<p>Ahmed Khachia Errahman</p>
				<div class="social-media">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<i class="fa fa-twitter" aria-hidden="true"></i>
					<i class="fa fa-instagram" aria-hidden="true"></i>
				</div>
			</div>
			<div class="messages">
				<ul class="ul">
					
					
				</ul>
			</div>
			<div class="message-input">
				<div class="wrap">
					<!-- action="ChatRequette.php" method="POST" -->
				<form id="messageForm"  >
					<input type="text" style="display:none" class="roomCommun" name ="roomCommun" value="">
					<input type="text" style="display:none" class="nameRoom" name ="nameRoom" value="">

					<input type="text" id="chat_input" autocomplete="off" name="message" class="inputChat" placeholder="Write your message..." />
					<input type="text" style="display:none" class="chat_button" name ="id_seder" id="id_seder" value="<?php echo $_SESSION['id']; ?>">
					<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
					<!-- <button id="sendingMessage" type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button> -->
				</form>	
				</div>
			</div>
		</div>
	</div>
</div>  
            
        
<script type="text/javascript">
var x = '';
		jQuery(function($){
			
			$(".contact").click(function(e){
				$(".messages").load(" .ul");
				 x =$($(this)).attr('id');
				 y=$($(this)).attr('value');
				 $(".roomCommun").attr('value',y);
				 $(".nameRoom").attr('value',x);
				//  alert(x);
					// e.preventDefault();						
					var communRoom = x;
					$.ajax({
						type:'POST',																	
						url: "./fetchingMessages.php",											
						dataType: "json",						
						data:{
							communRoom:communRoom,
						},
						success:function (data){												
							data.forEach(aficheMSG);					
								function aficheMSG(message) {									
									var option={hour:'numeric',hour12:false, minute:'2-digit'};
									var time_message = message['time'];
									var nowwww = new Date(time_message).toLocaleString("en-GB", option);																								
									if(message['id_seder'] == <?php echo $_SESSION['id']; ?>){							
										$(".ul").append("<li class='sent' style='color:#fff' >"+"<p class='walo'>"+"<b>"+message['prenom']+": </b>"+message['message'] +"<br>"+nowwww+"</p>"+"</li>");							
									}else{						
										$(".ul").append("<li class='replies' style='color:black' >"+"<p class='walo'>"+"<b>"+message['prenom']+": </b>"+message['message']+"<br>"+nowwww +"</p>"+"</li>");
									}
									
								}
								var messageDIV = $(".messages");
								var scrollh = messageDIV[0].scrollHeight;	
								$('.messages').animate({scrollTop:scrollh}, '0');   				
						}
					});				
			})			
			
			// Websocket			
			var websocket_server = new WebSocket("ws://localhost:8080/");
			websocket_server.onopen = function(e) {
				websocket_server.send(
					JSON.stringify({
						'type':'socket',
						'user_id':'<?php echo $_SESSION['prenom']; ?>'
					})
				);
			};
			websocket_server.onerror = function(e) {
				// Errorhandling
			}
			websocket_server.onmessage = function(e)
			{	
					
					if(true){
						var json = JSON.parse(e.data);	
						// alert(json.room);
						if(json.room == x){							
						switch(json.type){
						case 'chat':
							$('.ul').append(json.msg);
							var messageDIV = $(".messages");
							var scrollh = messageDIV[0].scrollHeight;
							$('.messages').animate({scrollTop:scrollh}, '4000');   
							break;
						}
					}
				}
					
				}
	
			// Events
			$('.inputChat').on('keyup',function(e){			
				if(e.keyCode==13 && !e.shiftKey)
				{
					e.preventDefault();
					var form= $("#messageForm")[0];					
					var formdata = new FormData(form);
					$.ajax({
						type:'POST',																	
						url: "./ChatRequette.php",
						dataType: "json",
						cache:false,
						data: formdata,						
						processData: false,
						contentType: false,																	
						success:function (data){																
							
						}
					});										
					var chat_msg = $(this).val();	
					var username = "<?php echo $_SESSION['prenom']; ?>";
					var option={hour:'numeric',hour12:false, minute:'2-digit'};
					var hourTime = new Date().toLocaleString("en-GB", option);
					websocket_server.send(
						JSON.stringify({
							'type':'chat',
							'user_id':<?php echo $session; ?>,
							'user_name':username,
							'chat_msg':chat_msg,
							'hourTime':hourTime,
							'sedeeer':x,
						})
					);
					$(this).val('');
				}
			});
		});
		</script>
		<script src="../Video-Call-App-master/js/config.js"></script>
		<script>
			// var createBtn = document.querySelector("#videoChat");            

            // createBtn.onclick = function(){
				$(".videoChat").each(function(){
					$(this).on("click",function(){
						var room =$(this).attr('value');
						var roomID = $(this).attr('id');
						var remoteName = $(this).attr('name');					
						var roomLink =appRoot+"comm.php?room="+room+"&roomID="+roomID+"&remote="+remoteName;
                    	window.location.href=roomLink;
					})
				})
                
		</script>	
				
    </body>

	</html>
	


