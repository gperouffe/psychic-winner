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
		
		<main class="container">	
			<h2>Mon garde-manger</h2> 
			<h5>Sélectionnez les ingrédients dont vous disposez :</h5>
			<div class="divider"></div>
			</br>
		
		
			<form action="resultats.php" method="post">
				<ul class="collapsible popout" data-collapsible="expandable">
				<?php
				$db = new SQLite3("db/cuisineEtudiante.db");
				$listeTypes = $db->query('SELECT * FROM alimentcat;');
				while($type = $listeTypes->fetchArray()){
				echo
				'<li>
				<div class="collapsible-header">
					'.$type[1].'
				</div>';
				
				echo
				'<div class="collapsible-body row">';	
					
					$listeIngredients = $db->query('SELECT ID, NOM FROM ingredients WHERE TYPE = '.$type[0].';');
					while($ingredient = $listeIngredients->fetchArray()){
					echo
					'<div class="col s1.5" style="margin-left:20px; margin-top:7px; ">
						<input type="checkbox" id="'.$ingredient[1].'" name="placard[]" value="'.$ingredient[0].'" />
						<label class="black-text" for="'.$ingredient[1].'">'.$ingredient[1].'</label>
					</div>';
					}
				
				echo
				'</div></li>';
				}
				$db->close();
				?>
				</ul>  
				<div class="col s12 m6 l4" >
					<button class="btn-large waves-effect orange waves-light" type="submit" name="action">Rechercher
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</main>
	
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
	</body>
</html>
