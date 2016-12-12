<?php 
    session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>WDYW</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="Styles/login.css">

  
</head>

<body>
         <?php
            if(isset($_SESSION['username'])){
                echo 'Hello ' . $_SESSION['username'] ;
            }
            else{
                echo 'Not signed in';
            }

      ?>
  <div class="form">
   
      <ul class="tab-group">
        <li class="tab active"><a href="#create">Create Room</a></li>
        <li class="tab"><a href="#join">Join Room</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="create">   
          <h1>Welcome to WDYW!</h1>
          
          <form action="roomRegistrar.php" method="post">
          

            <div class="field-wrap">
              <label>
                Room-name<span class="req">*</span>
              </label>
                <input type="text" name="roomnamec" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
                <input type="password" name="roompasswordc" required autocomplete="off"/>
            </div>

                <button type="submit" class="button button-block">Get Started</button>
          
          </form>

        </div>
        
        <div id="join">   
          <h1>Welcome Back!</h1>
          
          <form action="roomValidation.php" method="post">
          

          <div class="field-wrap">
            <label>
              Room-name<span class="req">*</span>
            </label>
              <input type="text" name="roomnamej" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
              <input type="password" name="roompasswordj" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
