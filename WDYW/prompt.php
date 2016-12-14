<?php 
	session_start();
   // $con = mysqli_connect("localhost","root","","helloworld");
    $con=mysqli_connect("localhost","root","","helloworld");
    if($_POST['p']=='change'){
    	$prompt = $_POST['q'];
        $_prompt = mysqli_real_escape_string($con,$prompt);
        
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

            $statement = "UPDATE rooms SET roomprompt='$_prompt' WHERE roomname ='$roomname';" ;
			mysqli_query($con, $statement);
		}

?>