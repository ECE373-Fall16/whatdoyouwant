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
        $(document).ready(function(){
    		function refresh_div() {
        		jQuery.ajax({
            		url:'chatquery.php',
            		type:'POST',
            		success:function(results) {
            		    jQuery(".chat-message").html(results);
           		 }
        		});
    		}
    		t = setInterval(refresh_div,100);
    	});
		</script>
</head>
<body>
	<?php
            $con = mysqli_connect("localhost","root","","helloworld");

           
  
            if(isset($_SESSION['username'])){
                echo 'Hello ' . strtoupper($_SESSION['username']) .'. ';
                $username = $_SESSION['username'] ;
            }
            else{
                echo 'Not signed in ';
                 $username = "unknown";
            }
            
            if(isset($_SESSION['roomname'])){
                echo ' Welcome to ' . strtoupper($_SESSION['roomname']). '. ' ;
                $roomname = $_SESSION['roomname'] ;
            }
            else{
                echo ' No room?';
                $roomname = "";
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

        	$_roomname = mysql_real_escape_string($roomname);
        	$_username = mysql_real_escape_string($username);
        	$_comment = mysql_real_escape_string($comment);
            $statement1 = "INSERT into chat (room, user, message) VALUES ('$_roomname', '$_username', '$_comment')";
            mysqli_query($con, $statement1);
            $statement = "SELECT user,message from chat WHERE message != '' AND room = '$_roomname';";
            $res = mysqli_query($con, $statement);
      ?>
    <div>
        <form action="joinOrCreateRoom.php">
            <button>New Chat</button>
        </form>
    </div>
    
    <div>
        <form action="home.php">
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
		<div class="chat friend">
			<p class="chat-message"></p>
		</div>   
        <div class="chat-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <textarea name="comment" rows="5" cols="40"></textarea>
                <button type="submit" name="submit" value="Submit">Send</button>  
            </form>
        </div>
        </div>

</body>
</html>

