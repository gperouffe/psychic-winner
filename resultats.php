 
<?php 
	if(isset($_POST["placard"])){
		$placard = $_POST["placard"];
	}else{
	$placard = array();
}
	$db = new SQLite3("db/cuisineEtudiante.db");
	//Recherche de toutes les recettes qu'on ne peut pas faire avec les éléments du placard.
	$queryRecettes="SELECT DISTINCT IDRECETTE FROM correspondance WHERE IDINGR NOT IN(";
	if(count($placard)>0){
		foreach($placard as $ingredient){
			$queryRecettes = $queryRecettes."'".$ingredient."',";
		}
		$queryRecettes=substr($queryRecettes,0,strlen($queryRecettes)-1);//Retrait de la dernière virgule
	}	
	$queryRecettes = $queryRecettes.");";
	$idRecettes = $db->query($queryRecettes);
	//On en déduit toutes les recettes que l'on peut faire
	$queryInfos="SELECT ID, TITRE, TEMPSPREP, TEMPSCUIS FROM recettes WHERE ID NOT IN(";
	$id = $idRecettes->fetchArray();
	if($id!=false){
		do{
			$queryInfos .= "'".$id[0]."',";
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
		
		<main class="container">
				<h2>Résultats de la recherche</h2>
				<div class="divider"></div>
			<?php
			$rec =($infosRecettes->fetchArray());
			if($rec[0]==null){	
				echo '<i class="material-icons left medium">local_grocery_store</i>
					  <div class="flow-text">
						Désolé, mais il n\'existe pas de recette avec ces ingrédients. <br>
						Peut-être serait-il temps d\'aller faire les courses?
					  </div>';
			}
			else{
				$infosRecettes->reset();
				echo '<div class="collection">';
				while($recette = $infosRecettes->fetchArray()){
					$id=$recette[0];
					$nom=$recette[1];
					$temps=$recette[2]+$recette[3];
					echo '<a href="preparation.php?id='.$id.'" class="collection-item flow-text">'.$nom.'<span class="badge">'.$temps.' min</span></a>';
				}
			}
			$db->close();
			?> 	
		</main>
		
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
	</body>
</html>
