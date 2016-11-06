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
        <link rel="stylesheet" href="Styles/chat.css">
    </head>
    <body>
        <?php
              class MyDB extends SQLite3
                {
                    function __construct()
                    {
                        $this->open("C:\my website\chatDb_PDO.sqlite");
                    }
                }
                $db = new MyDB();
                if(!$db){
                    echo $db->lastErrorMsg();
                } else {
                    echo "Opened database successfully\n";
                }


        // define variables and set to empty values
        $comment= $name="";
        $nameErr="";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"])){
                $nameErr = "Can't be blank";
            }
            else{
                $name= $_POST["name"];
            }
            if(empty($_POST["comment"])){
                $comment = "";
            }
            else{
                $comment= $_POST["comment"];
            }
        }
                ?>
        
        <div class="chatbox">
            <div class="chatlogs">
                <div class="chat friend">
                    <p class="chat-message">What's up, Brother..!</p>
                </div>
                <div class="chat self">
                    <p class="chat-message">What's up, ..!</p>
                </div>
                <div class="chat friend">
                    <p class="chat-message">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Proin in tristique ipsum.
                        Quisque ut molestie nisl. Aliquam non viverra est. 
                        Curabitur in velit at arcu aliquam tempus. 
                        Proin facilisis, eros quis placerat sodales, 
                        ipsum ex suscipit mi, vel rhoncus nunc elit sit amet purus. Fusce egestas molestie arcu, at scelerisque elit finibus in. Duis eget sapien sed magna mattis vehicula. Duis libero ante, euismod vel ante id, commodo pretium nisi. Ut viverra, elit ut rutrum malesuada, mi lacus efficitur orci, quis luctus purus nisl in orci. 
                        Integer ante velit, sollicitudin sit amet risus a, iaculis scelerisque tellus.</p>
                </div>
                <div class="chat friend">
                    <p class="chat-message">What's up, Brother..!</p>
                </div>
                <div class="chat self">
                    <p class="chat-message">What's up, ..!</p>
                </div>
                <div class="chat friend">
                    <p class="chat-message">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Proin in tristique ipsum.
                        Quisque ut molestie nisl. Aliquam non viverra est. 
                        Curabitur in velit at arcu aliquam tempus. 
                        Proin facilisis, eros quis placerat sodales, 
                        ipsum ex suscipit mi, vel rhoncus nunc elit sit amet purus. Fusce egestas molestie arcu, at scelerisque elit finibus in. Duis eget sapien sed magna mattis vehicula. Duis libero ante, euismod vel ante id, commodo pretium nisi. Ut viverra, elit ut rutrum malesuada, mi lacus efficitur orci, quis luctus purus nisl in orci. 
                        Integer ante velit, sollicitudin sit amet risus a, iaculis scelerisque tellus.</p>
                </div>
<!--                <div class="chat">
                    <p class="chat-message">What's up, Brother..!</p>
                </div>-->
            </div>
<!--            <div class="chat-form">
                <textarea></textarea>
                <button>Send</button>
            </div>-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                Name: <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
                <br><br>
                <input type="submit" name="submit" value="Submit">  
            </form>
        </div>
        <?php

                $db->exec("INSERT INTO chat (name, comment) VALUES ('$name', '$comment');");

                //echo "hey";

                  $sql =<<<EOF
SELECT name,comment from chat WHERE comment != "";
EOF;

                $ret = $db->query($sql);
                while($row = $ret->fetchArray() ){
                    echo "". $row['name'];
                    echo ": " . $row['comment'] ."<br>";
                    }
        ?>
    </body>
</html>
