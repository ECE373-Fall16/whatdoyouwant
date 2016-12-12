<?php
    session_start();

    $con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld"); 
    //$con = mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");
    if($_POST['q']=='change'){
            $choice= $_POST['z'];
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "";
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
            $_roomplususer = $_roomname.$_username;
        	//run query to see if user already has a choice, if 1, do not insert
            $statement = "insert into selections (room, user, choice, roomplususer) VALUES ('$_roomname', '$_username', '$_choice','$_roomplususer') ON DUPLICATE KEY UPDATE choice='$_choice' ";
            if( ($roomname!="") && ($username!="") && ($choice!="") ){ mysqli_query($con, $statement); } 
   	}
?>