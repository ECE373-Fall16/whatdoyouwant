<?php
    session_start();
    $con = mysqli_connect("localhost","root","","helloworld");
    if($_POST['q']=='change'){
    	$choice= $_POST['z'];
    		if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'] ;
            }
            else{
                $username = "";
            }

            $_roomname = mysqli_real_escape_string($con,$roomname);
        	$_username = mysqli_real_escape_string($con,$username);
        	$_choice = mysqli_real_escape_string($con,$choice);
        	//run query to see if user already has a choice, if 1, do not insert
        	$statement1 = "INSERT into selections (room, user, choice) VALUES ('$_roomname', '$_username', '$_choice') ON DUPLICATE KEY UPDATE choice='$_choice'";
            mysqli_query($con, $statement1);
   	}
?>