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
			<h5>Sélectionnez les différents ingrédients dont vous disposez !</h5>
			<div class="divider"></div>
			</br>
		
		<div class="row">
			<form action="resultats.php" method="POST">
				<div class="col s12 m6 l2" name="viande[]">
					<h4>Viande</h4>
					<p>
						<input type="checkbox" class="filled-in" id="boeuf" value="boeuf" />
						<label class="black-text" for="boeuf">Boeuf</label>
					</p>
					<p>
						<input type="checkbox" class="filled-in " id="veau" value="veau" />
						<label class="black-text" for="veau">Veau</label>
					</p>
					
				</div>
				<div class="col s12 m6 l2">
					<h4>Légumes</h4>
					<p>
						<input type="checkbox" class="filled-in" id="poivrons" name="légumes" value="poivrons" />
						<label class="black-text" for="poivrons">Poivrons</label>
					</p>
					<p>
						<input type="checkbox" class="filled-in" id="courgettes" name="légumes" value="courgettes" />
						<label class="black-text" for="courgettes">Courgettes</label>
					</p>
					<p>
						<input type="checkbox" class="filled-in" id="courgettes" name="légumes" value="courgettes" />
						<label class="black-text" for="courgettes">Courgettes</label>
					</p>
					<p>
						<input type="checkbox" class="filled-in" id="courgettes" name="légumes" value="courgettes" />
						<label class="black-text" for="courgettes">Courgettes</label>
					</p>
					
				</div>
				<input type="submit" name="Appuie !"/>
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
