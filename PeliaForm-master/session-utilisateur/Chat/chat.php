<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/functions.php");

$medicaments = $bdd->prepare("SELECT * FROM temps_prises
                            JOIN medicaments
                                ON  temps_prises.id_medicament = medicaments.id_medicament
        WHERE temps_prises.id_user=:id_this_user");
        
$medicaments->execute(array('id_this_user' =>$id_user));

$xyz=0;
$valeur_un_jour='0';
$moyen_mensuel = '0';
$valeur_tous_medic='';
while($xyz < 30){
    $verif=1;
$today_date_table= dateSimple("Y-m-d","now - ".$xyz . 'Day');
$questionnaires_allMedic = $bdd->prepare("SELECT * FROM questionnaire 
							JOIN temps_prises
								ON questionnaire.id_temps = temps_prises.id_temps 
        WHERE temps_prises.id_user=:id_this_user AND questionnaire.date_questionaire=:dateQues");
        if(
$questionnaires_allMedic->execute(array('id_this_user' =>$id_user,'dateQues'=>$today_date_table))
){
$questionnaireallMedic = $questionnaires_allMedic->fetchAll(PDO::FETCH_ASSOC);
$valeur_un_jour='';
foreach($questionnaireallMedic as $elemntOfChart){
    
    
        $medicament=($elemntOfChart['prise1']+$elemntOfChart['prise2']+$elemntOfChart['prise3']+$elemntOfChart['prise4'])/$elemntOfChart['nombre_fois'];
        $moyen_mensuel = $moyen_mensuel . '+'. $medicament;
        $valeur_un_jour = $valeur_un_jour . '+'. $medicament;
    
$verif++;
}
}
$valeur_un_jour = "0" . $valeur_un_jour;
eval( "\$valeur_un_jour = $valeur_un_jour;" );

$nbr_medic_jours = ($verif==1) ? $verif : ($verif-1);
$Moyenne_journalier = $valeur_un_jour / $nbr_medic_jours;

$valeur_tous_medic = $valeur_tous_medic . '"'. $Moyenne_journalier.'",';

$xyz++;
if($xyz == 29){
    
    eval( "\$chihaja3 = $moyen_mensuel;" );
    
}
}
trim($valeur_tous_medic, " ,");
$Moyenne_mensuelle = $chihaja3 / $verif;

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../assets/img/pelia.png" type="image/png">
	<title>Chat</title>
	<?php
	include "../includes/link.php";
    ?>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../assets/css/json.css">
    <link rel="stylesheet" href="../assets/css/chat.css">
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
	<script>
		try {
			Typekit.load({
				async: true
			});
		} catch (e) {}
	</script>

</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<?php
	include "../includes/header.php";
    ?>
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
					<li class="contact">
						<div class="wrap">
							<span class="contact-status online"></span>
							<img src="../assets/img/team-1" alt="" />
							<div class="meta">
								<p class="name">Adnane Rouhi</p>
								<p class="preview">You just got LITT up, Mike.</p>
							</div>
						</div>
					</li>
					<li class="contact active">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="../assets/img/team-3" alt="" />
							<div class="meta">
								<p class="name">Abderrahmane El Filali</p>
								<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call
									their bluff. Or, you do any one of a hundred and forty six other things.</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status away"></span>
							<img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
							<div class="meta">
								<p class="name">Rachel Zane</p>
								<p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status online"></span>
							<img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
							<div class="meta">
								<p class="name">Donna Paulsen</p>
								<p class="preview">Mike, I know everything! I'm Donna..</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
							<div class="meta">
								<p class="name">Jessica Pearson</p>
								<p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status"></span>
							<img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
							<div class="meta">
								<p class="name">Harold Gunderson</p>
								<p class="preview">Thanks Mike! :)</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status"></span>
							<img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
							<div class="meta">
								<p class="name">Daniel Hardman</p>
								<p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
							<div class="meta">
								<p class="name">Katrina Bennett</p>
								<p class="preview">I've sent you the files for the Garrett trial.</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status"></span>
							<img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
							<div class="meta">
								<p class="name">Charles Forstman</p>
								<p class="preview">Mike, this isn't over.</p>
							</div>
						</div>
					</li>
					<li class="contact">
						<div class="wrap">
							<span class="contact-status"></span>
							<img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
							<div class="meta">
								<p class="name">Jonathan Sidwell</p>
								<p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
							</div>
						</div>
					</li>
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
				<ul>
					<li class="sent">
						<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
						<p>salam the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
						</p>
					</li>
					<li class="replies">
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<p>When you're backed against the wall, break the god damn thing down.</p>
					</li>
					<li class="replies">
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<p>Excuses don't win championships.</p>
					</li>
					<li class="sent">
						<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
						<p>Oh yeah, did Michael Jordan tell you that?</p>
					</li>
					<li class="replies">
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<p>No, I told him that.</p>
					</li>
					<li class="replies">
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<p>What are your choices when someone puts a gun to your head?</p>
					</li>
					<li class="sent">
						<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
						<p>What are you talking about? You do what they say or they shoot you.</p>
					</li>
					<li class="replies">
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do
							any one of a hundred and forty six other things.</p>
                    </li>
                    <li class="sent">
						<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
						<p>salam</p>
					</li>
				</ul>
			</div>
			<div class="message-input">
				<div class="wrap">
					<input type="text" placeholder="Write your message..." />
					<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
					<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>  
<?php
	include "../includes/script.php";
?>


	
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>	
<script src="../assets/js/chat.js"></script>
</body>

</html>