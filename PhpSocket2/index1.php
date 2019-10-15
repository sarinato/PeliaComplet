<?php
include("../session-utilisateur/config/verificationLogin.php");
require("../session-utilisateur/config/connect.php");
$session = mt_rand(1,999);
$room_selected= '';

$room = $bdd->prepare("SELECT * FROM users
INNER JOIN room		
ON room.id_seder = users.id
WHERE room.id_geter = :id_us 
and Type = 'medecin'
");

// ########################################"
// $users = $bdd->prepare("SELECT DISTINCT prenom, id_seder  FROM users
// INNER JOIN room		
// ON room.id_seder = users.id
// INNER JOIN message
// ON message.id_room = room.id_room
// WHERE room.id_geter = :id_us
// ORDER BY time DESC ;");
// $room = $bdd->prepare("SELECT * FROM message
// INNER JOIN room		
// ON room.id_room = (select id_room from message order by time limit 1)
// INNER JOIN users		
// ON room.id_seder = users.id
// WHERE room.id_geter = :id_us
// ORDER BY time DESC;");


if(
$room->execute(array('id_us' =>$_SESSION["id"]))){
	
}else{
	print_r($room->errorInfo());
}
// $users->execute(array('id_us' =>$_SESSION["id"]));
// $user = $users->fetchAll(PDO::FETCH_ASSOC);


$rooms = $room->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($user);
// echo "</pre>";
// $lastMsg= $bdd->query("SELECT message FROM `message` ORDER BY id DESC LIMIT 1");
// echo $lastMsg;
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../session-utilisateur/assets/img/pelia.png" type="image/png">
        <script src="js/jquery.js" type="text/javascript"></script>	
        <title>Chat</title>
        <?php
	include "../session-utilisateur/includes/linkChat.php";
	?>
    
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../session-utilisateur/assets/css/chat.css">
	<style>
	b::first-letter{
		text-transform: uppercase !important;
	}
	</style>
    </head>

    <body>

        <!--================ Start Header Menu Area =================-->
        <?php
	include "../session-utilisateur/includes/headerChat.php";
	?>
            <!--================ End Header Menu Area =================-->
           <?php 
           include "../session-utilisateur/includes/headChat.php";
           ?>

	<div class="site-main container">
<div style="" id="frame">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="../session-utilisateur/assets/img/me.jpg" class="online" alt="" />
					<p class="upper"><?php echo $_SESSION["prenom"]; ?></p>
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
			<!-- <div id="search">
				<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
				<input type="text" placeholder="Search contacts..." />
			</div> -->
			<div id="contacts">
			<ul id="ulContacts">
					
					<?php
					$i=0;
						foreach ($rooms as $use ){											
					?>						
						<li style="display:flex; justify-content:space-between" data="<?php echo $use['id_seder'] ?>" class="contact active" id="<?php echo $use['room_name']; ?>" value="<?php echo $use['id_room']; ?>">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="../session-utilisateur/assets/img/me.jpg" alt="" />
							<div class="meta">
								
								<p class="name" id="Remote"><?php echo $use["prenom"]; ?></p>

								<p class="preview" id="<?php echo $use['id_seder'] ?>"><?php echo "salam" ?></p>
								
							</div>
						</div>
						<a id="<?php echo $use['id_room']; ?>" class="videoChat" value="<?php echo $use['room_name']; ?>" name=" <?php echo $use['prenom']; ?>"><img style="position:relative;right:10%" src="../session-utilisateur/assets/img/video-callBlue.svg" width="45"></a>
					</li>
<?php
					}?>										
				</ul>
			</div>			
		</div>
		<div class="content">
			<div class="contact-profile">
				<img src="../session-utilisateur/assets/img/me.jpg" alt="" />
				<p class="upper NomGet"></p>
				<div class="social-media">
				<img class="back" src="../session-medecin/assets/images/back.svg" alt="" />
				</div>				
			</div>
			<div class="messages">
				<ul class="ul">
					
		
				</ul>
			</div>
			<div class="message-input">
				<div class="wrap">
					
				<form id="messageForm"  >
					<input type="text" style="display:none" class="roomCommun" name ="roomCommun" value="">
					<input type="text" style="display:none" class="nameRoom" name ="nameRoom" value="">

					<input type="text" id="chat_input" name="message" class="inputChat" placeholder="Ecrire votre message..." />
					<input type="text" style="display:none" class="chat_button" name ="id_seder" id="id_seder" value="<?php echo $_SESSION['id']; ?>">
					<i class="fa fa-paperclip attachment" aria-hidden="true"></i>

				</form>	
				</div>
			</div>
		</div>
	</div>
</div>  
            <!-- ################# Scripts ###################"-->
 
			<script>
	
	(function($) {
		
		/*
		* We need to turn it into a function.
		* To apply the changes both on document ready and when we resize the browser.
		*/
		
		function mediaSize() { 
			/* Set the matchMedia */
			if (window.matchMedia('(max-width: 768px)').matches) {
			/* Changes when we reach the min-width  */
			$('#sidepanel').css('display', 'block');
			$('.content').css('display', 'none');
				$('#sidepanel').css('width', '100%')
				$('#frame').css('width', '100%');
				$('.back').css('display', 'block');
				$(".back").click(function(e){
					$('#sidepanel').css('display', 'block');
					$('#sidepanel').css('width', '100%');
					$('.content').css('display', 'none');
					
				})
	
			} else {
			/* Reset for CSS changes – Still need a better way to do this! */
			$('#sidepanel').css('display', 'block');
			$('#sidepanel').css('width', '30%');
			$('.content').css('display', 'block');
			$('.back').css('display', 'none');
			$('#frame .content').css('width', '70%')
			}
		};
		
		/* Call the function */
	  mediaSize();
	  /* Attach the function to the resize event listener */
		window.addEventListener('resize', mediaSize, false);  
		
	})(jQuery);
		</script> 			

<script type="text/javascript">
var x = '';
		jQuery(function($){
			var contactList = $(".contact");			
			var i = 0;                    

			function myLoop () {          
				setTimeout(function () {   
					contactList[i].click();         
					i++;                    
					if (i < contactList.length ) {           
						myLoop();            
					}
					if(i == contactList.length){						
						setTimeout(function(){
							contactList[0].click();  
						},100)
					}
				}, 100)				
			}

			myLoop(); 
			                    
			
			
			$(".contact").click(function(e){
			
	
	function mediaSize() { 
		/* Set the matchMedia */
		if (window.matchMedia('(max-width: 768px)').matches) {
		/* Changes when we reach the min-width  */
		$('#sidepanel').css('display', 'none');
		$('.content').css('display', 'block');
		$('.content').css('width', '100%');
			
		

		} else {
		/* Reset for CSS changes – Still need a better way to do this! */
		$('#sidepanel').css('display', 'block');
		$('.content').css('display', 'block');
		// $('.content').css('width', '60%');
		}
	};
	
	/* Call the function */
  mediaSize();
  /* Attach the function to the resize event listener */
	window.addEventListener('resize', mediaSize, false); 
				$(".messages").load(" .ul");
				 x =$($(this)).attr('id');
				 y=$($(this)).attr('value');
				 $(".roomCommun").attr('value',y);
				 $(".nameRoom").attr('value',x);
				  prev =$(this).find(".wrap .meta .preview");
				  prev.css("font-weight","300");
				 thiss = $(this);
				 $(thiss).removeClass("heartbeat");				
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
							$(".ul").append("<li class='sent' style='color:#fff' >"+"<img src='../session-medecin/assets/images/faces/me.jpg '/>	"+"<p class='walo'>"+message['message'] +" <br>"+"<span class='timee'>"+nowwww+"</span>"+"</p>"+"</li>");
							var last =$(".ul li:last-child p").text();
							prev.html(last);							
							
							
						}else{
							$(".NomGet").html(message['prenom']);
							$(".ul").append("<li class='replies' style='color:black' >"+"<img src='../session-medecin/assets/images/faces/me.jpg '/>	"+"<p class='walo'>"+message['message']+" <br>"+"<span class='timee'>"+nowwww +"</span>"+"</p>"+"</li>");
							var last =$(".ul li:last-child p").text();
								prev.html(last);
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
		function daba(){
				
						
			}
			websocket_server.onmessage = function(e)
			{	
				var json = JSON.parse(e.data);
								
					if(true){
						var cnt =$(".contact");
						var parent =$("#ulContacts");
						var yy=cnt[0].getAttribute("id");
					for(var i=0;i<cnt.length;i++){
						
						if(cnt[i].getAttribute("id")==json.room){							
							cnt[i].getElementsByClassName("preview")[0].innerHTML=json.preview;
							cnt[i].getElementsByClassName("preview")[0].style.fontWeight='600';
							cnt[i].classList.add('heartbeat');
							parent.prepend(cnt[i]);
						}
						
					}
						if(json.room == x){							
						switch(json.type){
						case 'chat':
							$('.ul').append(json.msg);
							var messageDIV = $(".messages");
							var scrollh = messageDIV[0].scrollHeight;
							$('.messages').animate({scrollTop:scrollh}, '4000');
							
							var fin =$(".ul li:last-child p").text();
							prev.html(fin);																			
							 
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
						url: "./ChatRequette1.php",
						dataType: "json",
						cache:false,
						data: formdata,						
						processData: false,
						contentType: false,																	
						success:function (data){	
							
								// alert("yes");
							
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
							'sedeeer':x		
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
		<?php
	include "../session-utilisateur/includes/script.php";
?>


	
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>	
		<script src="../session-utilisateur/assets/js/chat.js"></script>      

    </body>

	</html>
	


