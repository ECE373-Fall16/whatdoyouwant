<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","helloworld");
    //$con = mysqli_connect("localhost","root","","helloworld");
    if($_POST['o']=='change'){
    	$result = $_POST['rand'];
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

            $statement = "UPDATE rooms SET result='$result' WHERE roomname ='$roomname';" ;
			mysqli_query($con, $statement);
		}

?>