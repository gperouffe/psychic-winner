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
		
		<div class="container">	
			<h2>Mon frigo</h2> 
			<h5>Sélectionnez les ingrédients dont vous disposez :</h5>
			<div class="divider"></div>
			</br>
		
		<div class="row">
			<form action="resultats.php" method="post">
				<?php
				$db = new SQLite3("db/cuisineEtudiante.db");
				$listeTypes = $db->query('SELECT * FROM alimentcat');
				while($type = $listeTypes->fetchArray()){
				echo
				'<div class="col s12 m6 l2" >
					<h4>'.$type[1].'</h4>';
					
					$reponse = $db->query('SELECT * FROM ingredients WHERE TYPE = '.$type[0]);
					while($tuple = $reponse->fetchArray()){
					echo
					'<p>
						<input type="checkbox" class="filled-in" id="'.$tuple[1].'" name="'.$type[1].'" value="'.$tuple[1].'" />
						<label class="black-text" for="'.$tuple[1].'">'.$tuple[1].'</label>
					</p>';
					}
				
				echo
				'</div>';
				}
				?>
				<p><input type="submit" name="Appuie !"/></p>
			</form>
		</div>
		</div>
	
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
	</body>
</html>
