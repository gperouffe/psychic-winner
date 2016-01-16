<?php	

$nbResParPage = 6;
$db = new SQLite3("db/cuisineEtudiante.db");

if(isset($_POST["page"])){
	$pageCourante = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($pageCourante)){die('Numero de page invalide!');}
}else{
	$pageCourante = 1;
}

$resultats = $db->query("SELECT COUNT(*) FROM recettes");
$nbRecettes = $resultats->fetchArray();
$nbPages = ceil($nbRecettes[0]/$nbResParPage);

$positionRes = (($pageCourante-1) * $nbResParPage);

$resultats = $db->query("SELECT * FROM recettes ORDER BY ID ASC LIMIT $positionRes, $nbResParPage");

while($recette = $resultats->fetchArray()){
	$id = $recette[0];
	$name = $recette[1];
	$description = $recette[2];
	$tps_prep = $recette[3];
	$tps_cuis = $recette[4];
	$note = $recette[5];
	$img = $recette[6];
	$diff = $recette[7];
	$tps = $tps_prep + $tps_cuis;
	$note_arr = round ($note , 2 , PHP_ROUND_HALF_DOWN);
	echo 
	'<div class="card small col s12 m4">';
	echo 
	'	<div class="card-image waves-effect waves-block waves-light">
			<img class="activator" src="'.$img.'">
		</div>
		<div class="card-content">
			<span class="card-title activator grey-text text-darken-4"><a href="preparation.php?id='.$id.'">'.$name.'</a>
			<i class="material-icons right">more_vert</i></span>
		</div>
		<div class="card-reveal ">
			<span class="card-title grey-text text-darken-4">'.$name.'<i class="material-icons right">close</i></span>
			<h6>Durée de la recette :</h6>
			'.$tps.' minutes

			<h6>Note : '.$note_arr.'/5</h6>
			

			<h6>Difficulté : '.$diff.'/5</h6>
			
		</div>';
	echo 
	'</div>';
}

echo paginate_function($nbResParPage, $pageCourante, $nbRecettes[0], $nbPages);

function paginate_function($nbResParPage, $pageCourante, $nbRecettes, $nbPages)
{
    $pagination = '';
    if($nbPages > 0 && $nbPages != 1 && $pageCourante <= $nbPages){
        $pagination .= '<div class ="col s12 center"><ul class="pagination">';
        
        $right_links    = $pageCourante + 3; 
        $left_links    = $pageCourante - 3; 
        $previous       = $pageCourante - 1;
        $next           = $pageCourante + 1;
        
		if($pageCourante == 1){
            $pagination .= '<li class="grey-text" style="width:50px"><i class="material-icons small">chevron_left</i></li>';
        }
        if($pageCourante > 1){
            $pagination .= '<li class="waves-effect" data-page="'.$previous.'" style="width:50px"><a href="#" title="Précédent"><i class="material-icons small">chevron_left</i></a></li>';
                for($i = $left_links; $i < $pageCourante; $i++){
                    if($i > 0){
                        $pagination .= '<li class="waves-effect" data-page="'.$i.'" style="width:30px"><a href="#" title="Page '.$i.'">'.$i.'</a></li>';
                    }
                }   
        }        
		
        $pagination .= '<li class="active orange">'.$pageCourante.'</li>';
		  
	   for($i = $pageCourante+1; $i < $right_links; $i++){
			if($i <= $nbPages){
				$pagination .= '<li class="waves-effect" data-page="'.$i.'" style="width:30px"><a href="#" title="Page '.$i.'">'.$i.'</a></li>';
			}
		}   
		
        if($pageCourante < $nbPages){ 
                $pagination .= '<li class="waves-effect"  data-page="'.$next.'" style="width:50px"><a href="#!" title="Suivant"><i class="material-icons small">chevron_right small</i></a></li>'; 
        }
        if($pageCourante == $nbPages){ 
                $pagination .= '<li class="grey-text" style="width:50px"><i class="material-icons small">chevron_right small</i></li>'; 
        }
        $pagination .= '</ul></div>'; 
    }
    return $pagination;
}

?>
