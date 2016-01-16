<?php
$note=$_POST["note"];
$id=$_POST["id"];
if($note>0&&$note<=5){
	$db = new SQLite3("db/cuisineEtudiante.db");
	$queryRecette="SELECT NOMBREVOTES, NOTE FROM recettes WHERE ID='".$id."';";
	$anciensVotes = $db->query($queryRecette);
	$tuple=$anciensVotes->fetchArray();
	$nbVotes=$tuple[0];
	$ancienneNote=$tuple[1];
	$nouvelleNote=($nbVotes*$ancienneNote+$note)/($nbVotes+1);
	$queryUpdate="UPDATE recettes
				SET NOMBREVOTES='".($nbVotes+1)."', NOTE='".$nouvelleNote."'
				WHERE ID='".$id."';";
	$db->exec($queryUpdate);
	$db->close();
}
?>