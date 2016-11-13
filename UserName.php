
<html>
Please Enter Username:<br>
<form action = "Chat.php" method = "post">
<input type="text" name="UserName" />
<input type="submit"/>

   <?php $ID =  $_POST['ID'];
   session_start();
  $_SESSION['ID'] = $ID;
    $Password = $_POST['password']; 
    ?>
	</form>
 
  
</html>