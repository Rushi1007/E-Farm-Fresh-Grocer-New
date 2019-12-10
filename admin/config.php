<?php


$CONN = mysqli_connect('localhost','root','');
if($CONN){
	$DB=mysqli_select_db('dbshopping', $CONN);
	if(!$DB){
		mysqli_close($CONN);
		echo "Cannot Select DataBase";
	}
}else{
	echo "Cannot connect to mySql Server.";
}?>
