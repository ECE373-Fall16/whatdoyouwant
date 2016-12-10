<?php
ob_start();

    session_start();
    //$con = mysqli_connect("localhost","root","","helloworld");
    $con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

    $roomname= $_POST['roomnamej'];
    $password = $_POST['roompasswordj'];
    $statement = "SELECT id from rooms WHERE roomname='$roomname' AND roompassword='$password' ";

    $res = mysqli_query($con, $statement);

    if($res)
    {
            while($arr = mysqli_fetch_array($res))
            {
                //echo 'SUCES!';   
                //$_SESSION['username']=$username;
                $_SESSION['roomname']=$roomname;
                 $username =  $_SESSION['username'];
                 $tempusername = $username."_list";
                $sql= "insert into $tempusername (activerooms) VALUES ('$roomname') ";
                mysqli_query($con, $sql);
                header('Location: testing.php');

            }

    }
    $row= mysqli_num_rows($res);
    if(!$row)
    {


            //echo "Invalid Login Details";

            header('Location: joinOrCreateRoom.php');
    }
   ?> 
