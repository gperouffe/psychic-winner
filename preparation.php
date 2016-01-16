<?php 
	$idrecette =  $_GET['id'];
	$db = new SQLite3("db/cuisineEtudiante.db");
	$queryRecette="SELECT * FROM recettes WHERE ID='".$idrecette."';";
	$infos = $db->query($queryRecette);
	$queryIngr="SELECT NOM FROM ((SELECT IDINGR FROM correspondance WHERE IDRECETTE = '".$idrecette."')
				INNER JOIN ingredients ON ingredients.ID = IDINGR);";
	$list_ingr = $db->query($queryIngr);
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
			<?php 
			while ($rec = $infos->fetchArray()){
					$id = $rec[0];
					$name = $rec[1];
					$prep = $rec[2];
					$tps_cuis = $rec[4];
					$tps_prep = $rec[3];
					$img = $rec[6];
					$diff = $rec[7];
					$note = $rec[5];
					$nbVotes = $rec[8];
			echo '
			<div class="container">	
				<h2>'.$name.'</h2> 
				<div class="divider"></div>
				</br>
				
				 <div class="row ">
					<div class="col s12 m6 l6">
					  <div class="card">
						<div class="card-image">
						  <img src="'.$img.'">
						</div>
					  </div>
					</div>
					<div class="col s12 m3 l3">
						<h5>Ingrédients</h5>
						
						<ul>';
						while ($ingr = $list_ingr->fetchArray()){
							$name_ingr = $ingr[0];
						echo '<li>'.$name_ingr.'
							</li>';
						}
					echo '</ul>
					</div>
					<div class="col s12 m3 l3">
						<h5>Temps de préparation</h5>
						'.$tps_prep.' min
						
					</div>
					<div class="col s12 m3 l3">
						<h5>Temps de cuisson</h5>
						'.$tps_cuis.' min
					</div>
					
					<div class="col s12 m3 l3">
						<h5>Difficulté</h5>
						<div id="difficulte" nombre="'.$diff.'" style="min-width:9em">
						</div>
					
					</div>
					
					<div id="note" class="col s12 m3 l3">
						<h5>Note ('.$nbVotes.')</h5>
						<div>
						<div id="etoiles" nombre="'.$note.'" idRecette='.$id.' style="min-width:9em">
						</div></div>
					</div>
							
					<div class="col s12 flow-text" >
						<h5>Préparation</h5>
						'.$prep.'
					</div>
			
				</div>
			</div>
			';
		}
			$db->close();
			?>
		</main>
		
		<div id="footer"></div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/headfoot.js"></script>
		<script type="text/javascript" src="js/notation.js"></script>
	</body>
</html>
