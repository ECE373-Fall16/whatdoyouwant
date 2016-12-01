<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $con = mysqli_connect("localhost","root","","helloworld");

            $name = $_POST['name1'];
            $password = $_POST['password1'];
            $statement = "SELECT id from register WHERE name='$name' ";
            $res = mysqli_query($con, $statement);
            echo '$res';
            if($res){
                while($arr = mysqli_fetch_array($res)){
                    echo 'Username Taken!';
                    header('Location: home.php');
                    
                }
            }
            $row= mysqli_num_rows($res);
            if(!$row){
                $statement = "insert into register (name, password) VALUES ('$name', '$password') ";
                $res = mysqli_query($con ,$statement);
                echo 'Success!';
                header('Location: Chat.php');
            }

        ?>
    </body>
</html>
