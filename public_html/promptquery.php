<?php
    ob_start();

    session_start();
    $con = mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

           
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }
             $statement = "SELECT roomprompt from rooms WHERE roomname = '$roomname';";
             $res = mysqli_query($con, $statement);
					if($res){
                    	while($arr = mysqli_fetch_array($res)){
                    		echo "".$arr['roomprompt'];
         				}
         			}
?>