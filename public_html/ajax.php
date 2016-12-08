<?php 
    ob_start();

    session_start();

	if($_POST['y']=='change'){
	    $uid = $_POST['x'];
		$_SESSION['roomname']= $uid;
		echo 'successfrom';	
	}
?>
