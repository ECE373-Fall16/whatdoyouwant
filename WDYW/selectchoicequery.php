<?php
    session_start();
    $con = mysqli_connect("localhost","root","","helloworld");

            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }


             $statement = "SELECT choice from selections WHERE room = '$roomname';";
             $res = mysqli_query($con, $statement);
					if($res){
                    	while($arr = mysqli_fetch_array($res)){
                    		//$arr2[$arr['choice']]++;
                            echo "".$arr['choice']."\n";
         				}
         			}
?>
