$(document).ready(
	function() {
		$diff = $("#difficulte").attr("nombre");
		$("#difficulte").load( 
			"noteEtoiles.php", 
			{"note":$diff,"avecLiens":0}
		);
		$note = $("#etoiles").attr("nombre");
		$("#etoiles").load( 
			"noteEtoiles.php", 
			{"note":$note,"avecLiens":1}
		);
		
		$dejaVote= false;
		
		$('#etoiles').on("mouseenter", "i",
			function(){
				if(!(($(this).hasClass("sansLien")))){
					$hovered = $(this).attr("num");
					$("#etoiles").load( 
						"noteEtoiles.php", 
						{"note":$hovered,"avecLiens":1}
					);
				}
			}
		);
		$('#etoiles').on("mouseleave",
			function(){
				if(!($(this).hasClass("sansLien"))){
					$("#etoiles").load( 
						"noteEtoiles.php", 
						{"note":$note,"avecLiens":1}
					);
				}
			}
		);
		$('#etoiles').on("click", "i",
			function(){
				if(!$dejaVote){
				$noteCliquee = $(this).attr("num");
				$idRecette = $("#etoiles").attr("idRecette");
				$.post(
					"recalculNote.php",
					{
						"note":$noteCliquee,
						"id":$idRecette
					},
					function(){
						Materialize.toast("Note enregistrée",3000);
						$("#etoiles").off("mouseenter");
						$("#etoiles").off("click");
						$dejaVote=true;
					}
				)
				}
			}
		);
	}
);