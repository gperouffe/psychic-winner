<?php
	$nbResParPage = 9;
	$db = new SQLite3("db/cuisineEtudiante.db");

	if(isset($_POST["page"])){
		$pageCourante = $_POST["page"];
		if(!is_numeric($nbPages)){die('Numero de page invalide!');}
	}else{
		$pageCourante = 1;
	}

	$resultats = $db->query("SELECT COUNT(*) FROM recettes");
	$nbRecettes = $resultats->fetchArray();
	$nbPages = ceil($nbRecettes[0]/$nbResParPage);

	$positionRes = (($pageCourante-1) * $nbResParPage);
	
	$recettes = $db->query("SELECT * FROM recettes ");

?>
 
 <!DOCTYPE html>
 <html>
	<head>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<meta charset='utf-8'>
		<title>La Cuisine Etudiante</title>
		<link rel="icon" href="img/poele.ico" type="image/x-icon">
	</head>

	<body>		
	<div id="header"></div>
		<main>
			<div class="row container">
				<h2>Liste des recettes</h2>
				<div class="divider"></div>
				
				<div id="results"></div>			
				<div id="loading-div"><i class="material-icons small">schedule</i> Attendez SVP, Chargement des recettes en cours</div>
		
				
				
			</div>
				
		</main>
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
		<script type="text/javascript" src="js/pagination.js"></script>
	</body>
</html>
