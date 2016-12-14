<?php
            session_start();
            //$con = mysqli_connect("localhost","root","","helloworld");
            $con=mysqli_connect("localhost","root","","helloworld");

            $username= $_POST['username'];
            $password = md5($_POST['password']);
            $statement = "SELECT id from register WHERE name='$username' AND password='$password' ";

            $res = mysqli_query($con, $statement);

            if($res)
            {
                    while($arr = mysqli_fetch_array($res))
                    {
                        //echo 'SUCES!';   
                        $_SESSION['username']= $username;
                        header('Location: testing.php');

                    }

            }
            $row= mysqli_num_rows($res);
            if(!$row)
            {


                    //echo "Invalid Login Details";
                    $_SESSION['no']="no";
                    header('Location: home.php');
            }
?>