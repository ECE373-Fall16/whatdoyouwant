<?php 
    ob_start();

	session_start();
    $con = mysqli_connect("localhost","root","","helloworld");
    if($_POST['p']=='change'){
    	$prompt = $_POST['q'];
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

            $statement = "UPDATE rooms SET roomprompt='$prompt' WHERE roomname ='$roomname';" ;
			mysqli_query($con, $statement);
		}

?>