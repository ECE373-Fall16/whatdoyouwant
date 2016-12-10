<?php
    session_start();
    $con = mysqli_connect("localhost","root","","helloworld");

           
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }
             $statement = "SELECT result from rooms WHERE roomname = '$roomname';";
             $res = mysqli_query($con, $statement);
					if($res){
                    	while($arr = mysqli_fetch_array($res)){
                    		echo "".$arr['result'];
         				}
         			}
?>