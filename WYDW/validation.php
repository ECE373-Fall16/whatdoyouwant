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

            $name= $_POST['name'];
            $password = $_POST['password'];
            $statement = "SELECT id from register WHERE name='$name' AND password='$password' ";

            $res = mysqli_query($con, $statement);

            if($res)
            {
                    while($arr = mysqli_fetch_array($res))
                    {
                        echo 'SUCES!';
                        header('Location: Chat.php');

                    }

            }
            $row= mysqli_num_rows($res);
            if(!$row)
            {


                    echo "Invalid Login Details";

                    header('Location: home.php');
            }
            ?>
    </body>
</html>
