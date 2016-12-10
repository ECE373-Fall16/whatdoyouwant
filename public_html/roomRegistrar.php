<?php
ob_start();

        session_start();

    //$con = mysqli_connect("localhost","root","","helloworld");
$con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

    $roomname = $_POST['roomnamec'];
    $password = $_POST['roompasswordc'];
    $statement = "SELECT id from rooms WHERE roomname='$roomname' ";
    $res = mysqli_query($con, $statement);
    if($res){
        while($arr = mysqli_fetch_array($res)){
            header('Location: joinOrCreateRoom.php');

        }
    }
    $row= mysqli_num_rows($res);
    if(!$row){
        $statement = "insert into rooms (roomname, roompassword) VALUES ('$roomname', '$password') ";
        $res = mysqli_query($con,$statement);
        $_SESSION['roomname']=$roomname;
        $username =  $_SESSION['username'];
        $tempusername = $username."_list";
        $sql= "insert into $tempusername (activerooms) VALUES ('$roomname') ";
        mysqli_query($con, $sql);
        header('Location: testing.php');
    }
?>


