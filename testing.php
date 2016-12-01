<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="Styles/test.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
		//	$(document).ready(function(){
	    //		$("p").click(function(){
	     //   		$(this).hide();
	    //		});
		//	});
		</script>
</head>
<body>
	<?php
            $con = mysqli_connect("localhost","root","","helloworld");

           
  
            if(isset($_SESSION['username'])){
                echo 'Hello ' . $_SESSION['username'] ;
                $username = $_SESSION['username'] ;
            }
            else{
                echo 'Not signed in';
                 $username = "unknown";
            }
            
            if(isset($_SESSION['roomname'])){
                echo 'Welcome to' . $_SESSION['roomname'] ;
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                echo 'No room?';
                $roomname = "test";
            }
             $comment= "";
             if($_SERVER["REQUEST_METHOD"]=="POST"){
	            if(empty($_POST["comment"])){
                	$comment = "";
            	}
           		else{
                	$comment= $_POST["comment"];
            	}
        	}

            $statement1 = "INSERT into chat (room, user, message) VALUES ('$roomname', '$username', '$comment')";
            mysqli_query($con, $statement1);
             $statement = "SELECT user,message from chat WHERE message != '' AND room = '$roomname';";
             $res = mysqli_query($con, $statement);
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
                    
                    <?php 
						if($res)
            			{

                    		while($arr = mysqli_fetch_array($res)){?>
                    <div class="chat friend">
                        <p class="chat-message">
                         <?php
         						echo "".$arr['user'];
         						echo ": " . $arr['message'] ."<br>";
                  		  ?>
                         </p>
                    </div>
                    <?php
                            } 
                        }
                         ?>  
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

