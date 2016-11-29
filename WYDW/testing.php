<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="Styles/test.css">
</head>
<body>
       <?php
            if(isset($_SESSION['username'])){
                echo 'Hello ' . $_SESSION['username'] ;
            }
            else{
                echo 'Not signed in';
            }
            
            if(isset($_SESSION['roomname'])){
                echo 'Welcome to' . $_SESSION['roomname'] ;
            }
            else{
                echo 'No room?';
            }

      ?>
    <div>
        <form action="joinOrCreateRoom.php">
            <button>New Chat</button>
        </form>
    </div>
    
    <div>
        <form action="/">
            <button>Sign-out</button>
        </form>
    </div>
    
    <div class="container">

        
        <nav>
          <ul>
            <li><a href="#">London</a></li>
            <li><a href="#">Paris</a></li>
            <li><a href="#">Tokyo</a></li>
          </ul>
        </nav>

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
                <div class="chat-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                         <textarea name="comment" rows="5" cols="40"></textarea>
                         <button type="submit" name="submit" value="Submit">Send</button>  
                     </form>
                </div>
            </div>


    </div>

</body>
</html>

