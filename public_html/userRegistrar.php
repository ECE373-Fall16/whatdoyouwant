<?php
    

        session_start();

    //$con = mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");
    $con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

    $username = $_POST['username1'];
    $password = md5($_POST['password1']);
    $statement = "SELECT id from register WHERE name='$username' ";
    $res = mysqli_query($con, $statement);
    if($res){
        while($arr = mysqli_fetch_array($res)){
            $_SESSION['taken']="taken";
            header('Location: home.php');

        }
    }
    $row= mysqli_num_rows($res);
    if(!$row){
        $statement = "insert into register (name, password) VALUES ('$username', '$password') ";
        $res = mysqli_query($con ,$statement);
        $_SESSION['username'] = $username;
        $tempusername = $username."_list";
        $sql = "CREATE TABLE $tempusername (
activerooms VARCHAR(20) NOT NULL PRIMARY KEY
)";

        mysqli_query($con, $sql);
        header('Location: testing.php');
    }



?>