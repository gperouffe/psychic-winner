<?php
$note=$_POST["note"];
$avecLiens=$_POST["avecLiens"];
if($avecLiens){
	for($i=1;$i<=5;$i++){
		if($i<=$note){
			echo '<i num='.$i.' class="material-icons"><a class="yellow-text" href="#">grade</a></i>';
		}
		else{
			echo '<i num='.$i.' class="material-icons"><a class="grey-text" href="#">grade</a></i>';
		}
	}
}
else{
	for($i=1;$i<=5;$i++){
		if($i<=$note){
			echo '<i class="material-icons yellow-text sansLiens">grade</i>';
		}
		else{
			echo '<i class="material-icons grey-text sansLiens">grade</i>';
		}
	}	
}
?>