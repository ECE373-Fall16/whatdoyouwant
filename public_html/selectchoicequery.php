<?php
    session_start(); //session was below header
    header('Content-Type: application/json');
    //$con = mysqli_connect("localhost","root","","helloworld");
$con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                $roomname = "test";
            }

             $statement = "SELECT choice,COUNT(choice) from selections WHERE room = '$roomname' GROUP BY choice;";
             $res = mysqli_query($con, $statement);
					if($res){
                    	while($arr = mysqli_fetch_array($res)){

                            $array[$arr['choice']]=$arr['COUNT(choice)'];
         				}
         			}
                    echo json_encode($array);
?>
