<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/pelia.png" type="image/png">
	<title>Chercher un médicament</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/auto.css">
</head>
<body>
   <?php 
 include "nav.php"  
   ?>
    <section id="home" class="homee" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

			<div class="col-md-12 col-sm-12 ">
                   
				   <div class="container all">
					   <h1 class="chercher">Chercher un médicament</h1>
					   <!-- <div class="container2">
						   <div class="search-group v2">
							   <input class="search-input inactive" type="text" placeholder="Entrer le nom de médicament"/>
							   <button class="button button-brand-primary button-search">Chercher</button>
						   </div>
					   </div> -->
					   <div class='container'>
    <form class='autocomplete-container'>
      <div
        class='autocomplete'
        role='combobox'
        aria-expanded='false'
        aria-owns='autocomplete-results'
        aria-haspopup='listbox'
      >
        <input
          class='autocomplete-input search-input inactive'
          placeholder='Chercher un Médicament'
          aria-label='Search for a fruit or vegetable'
          aria-autocomplete='both'
          aria-controls='autocomplete-results' spellcheck="false"
        >
        <button type='submit' class='autocomplete-submit button button-brand-primary button-search' aria-label='Search'>
          <svg aria-hidden='true' viewBox='0 0 24 24'>
            <path d='M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z' />
          </svg>
        </button>
      </div>
      <ul
        id='autocomplete-results'
        class='autocomplete-results hidden'
        role='listbox'
        aria-label='Chercher un Médicament'
      >
      </ul>
    </form>
  </div>
					   <script type= »text/javascript » src= »http://cdn.dev.skype.com/uri/skype-uri.js »></script>

				   </div>
					   </div>

            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->
    <main>
	<h3 class='search-result'>Recherche: <span class="rech"></span></h3>
	<div class="container details">
	<p>Nom commerial : <span class="nom"> </span></p>
  <hr>
  <p>Dosage : <span class="Dosage"> </span></p>
  <hr>
  <p>La Forme : <span class="Forme"> </span></p>
  <hr>
  <p>Presentation : <span class="Presentation"> </span></p>
	<hr>
  <p>PPV : <span class="prix"> </span></p>
  <hr>
  <p>PH : <span class="PHH"> </span></p>
  <hr>
  <p>Prix_BR : <span class="prixBR"> </span></p>
  <hr>
  <p>Principe générique : <span class="Principe_generique"> </span></p>
  <hr>
  <p>Taux de remboursement : <span class="Taux"> </span></p>
	<hr>

	</div>

	</main>
	<?php 
      include "footer.php"
 	?>
	
	



    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/recherche.js"></script>
  <script src="js/script.js"></script>
  <script>
  // document.querySelector('form').addEventListener('submit', (event) => {
  //   alert($(".PPV").attr("class"));
  // })
  
  </script>


</body>
</html>