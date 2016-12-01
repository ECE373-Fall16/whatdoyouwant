<?php session_start();

	if($_POST['y']=='change'){
	    $uid = $_POST['x'];
		$_SESSION['roomname']= $uid;
		echo 'successfrom';	
	}
?>
