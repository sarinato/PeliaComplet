<?php
include("../session-medecin/pages/config/verificationLogin.php");
require("../session-medecin/pages/config/connect.php");
$session=12;
$room_selected= '';
$chihaja = $bdd->prepare("SELECT DISTINCT room_name FROM `room` WHERE id_geter = :id_session");
 $chihaja->execute(array('id_session' =>$_SESSION["id"]));

$chihaja4 = $chihaja->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
foreach($chihaja4 as $ch){

  $sdsd = $ch['room_name'];
  $message1 = $bdd->prepare("SELECT * FROM `message`
                                INNER JOIN room		
                                ON message.id_room = room.id_room 
                                INNER JOIN users		
                                ON room.id_seder = users.id
  WHERE message.room_name = :name_r AND users.Type = 'patient' ORDER BY time DESC LIMIT 1 "); 
  $message1->execute(array('name_r' =>$sdsd));
  $messages1 = $message1->fetchAll(PDO::FETCH_ASSOC);
  $last_message[$i] = $messages1;


  // echo "<h1>";
  // print_r($last_message);
  // echo "</h1>";
  $i++;
}
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../session-medecin/assets/img/pelia.png" type="image/png">
		<link rel="stylesheet" href="../session-medecin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../session-medecin/assets/vendors/css/vendor.bundle.base.css">
        <script src="js/jquery.js" type="text/javascript"></script>
	<!-- <style type="text/css">
	* {margin:0;padding:0;box-sizing:border-box;font-family:arial,sans-serif;resize:none;}
	html,body {width:100%;height:100%;}
	#wrapper {position:relative;margin:auto;max-width:1000px;height:100%;}
	#chat_output {position:absolute;top:0;left:0;padding:20px;width:100%;height:calc(100% - 100px);}
	#chat_input {position:absolute;bottom:0;left:0;padding:10px;margin-bottom:50px;width:100%;height:100px;border:7px solid #ccc;border-radius: 2%}
	</style> -->
        <title>Chat</title>
         <?php
	include "../session-medecin/pages/includes/link.php";
	?> 
     <link rel="stylesheet" href="../session-medecin/assets/css/style.css">
	<!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="../session-medecin/assets/css/chat.css">
	<style>
	b::first-letter{
		text-transform: uppercase !important;
	}
	</style>
	<link rel="shortcut icon" href="../session-medecin/assets/images/favicon.png" />
    </head>

    <body>

	<div class=" container-scroller">
    <?php include "../session-medecin/pages/navbar/navbarChat.php" ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
	  <?php include "../session-medecin/pages/sidenav/sidenavChat.php" ?>
	</div>
	</div>
	<div style="margin-left: 17.1%;" class="content-wrapper">
	<div class=" container">
<div style="" id="frame">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="../session-medecin/assets/images/faces/me.jpg" class="online" alt="" />
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
                        foreach ($last_message as $use ){
                    //    print_r ($use[0]);
                      ?>
						
						<li style="display:flex; justify-content:space-between" data="<?php echo $use[0]['id_seder'] ?>" class="contact active" id="<?php echo $use[0]['room_name']; ?>" value="<?php echo $use[0]['id_room']; ?>">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="../session-medecin/assets/images/faces/me.jpg" alt="" />
							<div class="meta">
								
								<p class="name" id="Remote"><?php echo $use[0]["prenom"]; ?></p>

								<p class="preview" id="<?php echo $use[0]['id_seder'] ?>"><?php echo $use[0]["message"];?></p>
								
							</div>
						</div>
						<a id="<?php echo $use[0]['id_room']; ?>" class="videoChat" value="<?php echo $use[0]['room_name']; ?>" name=" <?php echo $use[0]['prenom']; ?>"><img style="position:relative;right:10%" src="../session-medecin/assets/images/video-callBlue.svg" width="40"></a>
					</li>
<?php
					}?>
					
					
				</ul>
			</div>
			<!-- <div id="bottom-bar">
				<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add
						contact</span></button>
				<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
			</div> -->
		</div>
		<div class="content">
			<div class="contact-profile">
				<img src="../session-medecin/assets/images/faces/me.jpg" alt="" />
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
					<!-- action="ChatRequette.php" method="POST" -->
				<form id="messageForm"  >
					<input type="text" style="display:none" class="roomCommun" name ="roomCommun" value="">
					<input type="text" style="display:none" class="nameRoom" name ="nameRoom" value="">

					<input type="text" id="chat_input" name="message" class="inputChat" placeholder="Ecrire votre message..." />
					<input type="text" style="display:none" class="chat_button" name ="id_seder" id="id_seder" value="<?php echo $_SESSION['id']; ?>">
					<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
					<!-- <button id="sendingMessage" type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button> -->
				</form>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>  
<!-- <footer class="footer-distributed">

    <div class="row">
        <div class="col-md-4 footer-contact">
            <p>Contactez-nous sur:</p>
            
            <p><i class="fa fa-envelope ico"></i><a href="mailto:support@Youcode.ma">support@Youcode.ma</a></p>
        </div>
        <div class="copyright col-md-4">
            <p class="footer-company-name">YouCode © 2019</p>
        </div>
        <div class="footer-icons col-md-4">
            <p>Suivez-nous sur les réseaux sociaux</p>
            <a href="https://web.facebook.com/YouCodeSchool/"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/youcode18"><i class="fa fa-twitter"></i></a>
            <a href="https://ae.linkedin.com/company/youcode"><i class="fa fa-linkedin"></i></a>
            <a href="https://youtube.com"><i class="fa fa-youtube"></i></a>

        </div>

    </div>


</footer> -->
            
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
				/*
	* We need to turn it into a function.
	* To apply the changes both on document ready and when we resize the browser.
	*/
	
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
						url: "./fetchingMessages2.php",											
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
							$(".ul").append("<li class='sent' style='color:#fff' >"+"<img src='../session-medecin/assets/images/faces/me.jpg '/>	"+"<p class='walo'>"+message['message'] +" <br>"+"<span class='time'>"+nowwww+"</span>"+"</p>"+"</li>");
							var last =$(".ul li:last-child p").text();
							prev.html(last);							
							
							
						}else{
							$(".NomGet").html(message['prenom']);
							$(".ul").append("<li class='replies' style='color:black' >"+"<img src='../session-medecin/assets/images/faces/me.jpg '/>	"+"<p class='walo'>"+message['message']+" <br>"+"<span class='time'>"+nowwww +"</span>"+"</p>"+"</li>");
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
							// $("#ulContacts").prepend(thiss); 
							// $(thiss).addClass("heartbeat");
							var messageDIV = $(".messages");
							var scrollh = messageDIV[0].scrollHeight;
							$('.messages').animate({scrollTop:scrollh}, '4000');
							
							var fin =$(".ul li:last-child p").text();
							prev.html(fin);
							
							
							// console.log(thiss);
							 
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
						url: "./ChatRequette2.php",
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
	include "../session-medecin/pages/includes/script.php";
?>


	<script>
	$(".sidebar").css("margin-top","-3.6%");
	</script>
	
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>	
		<script src="../../session-medecin/assets/js/chat.js"></script>  
		 <!-- plugins:js -->
		 <script src="../session-medecin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../session-medecin/assets/js/off-canvas.js"></script>
    <script src="../session-medecin/assets/js/hoverable-collapse.js"></script>
    <script src="../session-medecin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->    

    </body>

	</html>
	


