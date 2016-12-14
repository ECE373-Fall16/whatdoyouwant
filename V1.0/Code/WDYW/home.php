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
  <div class="form">
   
      <ul class="tab-group">
        <li class="tab active"><a href="#create">Sign-Up</a></li>
        <li class="tab"><a href="#join">Login</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="create">   
          <h1>Welcome to WhatDoUWant!</h1>
          
          <form action="userRegistrar.php" method="post">
          

            <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
                <input type="text" name="username1" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
                <input type="password" name="password1" required autocomplete="off"/>
            </div>

                <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="join">   
          <h1>Welcome Back!</h1>
          
          <form action="userValidation.php" method="post">
          

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
              <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
              <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
    <?php 
    if(isset($_SESSION['no'])) {
        echo '<script>';
        echo 'alert("Incorrect Username/Password!")';
        echo '</script>';
        unset($_SESSION['no']);
    }
    if(isset($_SESSION['taken'])){
        echo '<script>';
        echo 'alert("Username Taken!")';
        echo '</script>';
        unset($_SESSION['taken']);
    }
?>

</body>
</html>
