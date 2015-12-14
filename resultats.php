 
<?php 
	$placard =  $_POST['placard'];
	$db = new SQLite3("db/cuisineEtudiante.db");
	$queryRecettes="SELECT IDRECETTE FROM correspondance WHERE IDINGR NOT IN(";
	foreach($placard as $ingredient){
		$queryRecettes = $queryRecettes."'".$ingredient."',";
	}
	$queryRecettes=substr($queryRecettes,0,strlen($queryRecettes)-1);
	$queryRecettes = $queryRecettes.");";
	$idRecettes = $db->query($queryRecettes);
	$queryInfos="SELECT * FROM recettes WHERE ID NOT IN(";
	$id = $idRecettes->fetchArray();
	if($id!=false){
		do{
			$queryInfos = $queryInfos."'".$id[0]."',";
		}while($id = $idRecettes->fetchArray());
		$queryInfos=substr($queryInfos,0,strlen($queryInfos)-1);
	}
	$queryInfos = $queryInfos.");";
	$infosRecettes = $db->query($queryInfos);
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
		
		<div class = "container">
		<?php
			while($recette = $infosRecettes->fetchArray()){
				echo "<p>".$recette[1]."<br>".$recette[2]."</p>";
			}
			$db->close();
		?> 	
		</div>
		
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
	</body>
</html>
