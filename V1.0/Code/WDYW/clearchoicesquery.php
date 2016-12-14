<?php
    session_start();
    //$con = mysqli_connect("localhost","root","","helloworld");
    $con=mysqli_connect("localhost","root","","helloworld");
    
    if($_POST['m']=='change'){
    	$choice= $_POST['z'];
    		if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

            $_roomname = mysqli_real_escape_string($con,$roomname);
            $statement = "DELETE from selections WHERE room = '$_roomname'";
            //$statement2 = "UPDATE rooms SET roomprompt='' WHERE roomname ='$roomname';" ;
            $statement3 = "UPDATE rooms SET result='' WHERE roomname ='$roomname';" ;
            mysqli_query($con, $statement);
                       // mysqli_query($con, $statement2);
                                    mysqli_query($con, $statement3);


            
   	}
?>