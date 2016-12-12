<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="Styles/test.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <form action="joinOrCreateRoom.php" style="display: inline">
            <button class="button">Join Room</button>
        </form>
        <form action="signOut.php" style="display: inline">
            <button class="signOut">Sign out</button>
        </form>
    </div>
    


	<?php
        //$con = mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");
        $con=mysqli_connect("localhost","wdyd_admin","jawk11","wdyd_helloworld");

           
  
            if(isset($_SESSION['username'])){
                 $username = $_SESSION['username'] ;
            }
            else{
                echo 'Not signed in ';
                 $username = "unknown";
            }
            
            if(isset($_SESSION['roomname'])){
                $roomname = $_SESSION['roomname'] ; ?>
                <div style=" text-align: center; margin-right: 250px; color: #1ab188;font-family: 'Titillium Web', sans-serif; font-size: 18px"> 
                    <h2><?php echo 'Hello ' . strtoupper($username) .'. '.'Welcome to: '.$roomname;?></h2>
                </div>
        <?php
            }
            else{?>
                <div style=" text-align: center; margin-right: 250px; color: #1ab188;font-family: 'Titillium Web', sans-serif; font-size: 18px"> 
                    <h2><?php echo 'Hello ' . strtoupper($username) .'. '.'Please Join a room';?></h2>
                </div>
    <?php
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

        	$_roomname = mysqli_real_escape_string($con,$roomname);
        	$_username = mysqli_real_escape_string($con,$username);
        	$_comment = mysqli_real_escape_string($con,$comment);
            $statement1 = "INSERT into chat (room, user, message) VALUES ('$_roomname', '$_username', '$_comment')";
            if($_comment!=''){mysqli_query($con, $statement1);}
            $statement = "SELECT user,message from chat WHERE message != '' AND room = '$_roomname';";
            $res = mysqli_query($con, $statement);
      ?>

    
    <div class="container">       
        <nav>
            <h3 style="color: #ffffff">Active Rooms:</h3>
            <ul>   
                <?php
                    $tempusername = $_SESSION['username']."_list";
                    $statement = "SELECT * from $tempusername";
                    $res = mysqli_query($con, $statement);
                    if($res){
                        while($arr = mysqli_fetch_array($res)){   		
                ?>            
                
               
                 <li>
            	<?php $var = $arr['activerooms'];?>
                <form id ="buttons">
                    <button class="myButton"><?php echo $var; ?></button>
                </form>

                <?php
                    }
                }
                ?>
                </li>
                
            </ul>

            <script>
			$(document).ready(function() {
                $("#buttons button").click(function() {
    				var x = $(this).text();
    				$.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: { 
                    	'y':'change',
                    	'x':x 
                    },
                    success: function(data)
                    {
 
                    }
                });
            });
        });
            </script>
        </nav>
        <div class="chatbox">
            <div class="chatlogs">
                <div class="chat self">
                    <p class="chat-message">
                     </p>
                </div>
            </div>
            <div class="chat-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    <input class="itextarea" type="text" name="comment">
                    <input class="ibutton" type="submit" value="Enter">
<!--                    <textarea class="itextarea" name="comment" rows="5" cols="40"></textarea>
                    <button class="ibutton" type="submit" name="submit" value="Submit">Send</button>  -->
                </form>
            </div>
        </div>
        
        <div class="decider">
            <div id ="prompt" style="color: #ffffff; text-align: left; margin-left: 20px; vertical-align: middle; line-height: 70px;  "> </div>
            <div id="result" style="color: #ffffff; text-align: center; margin-right: 150px; vertical-align: middle; " ></div>
            <div id="piechart"></div>
            <button onclick="addChoice()" style="margin-left: 110px;">My Choice</button>
            <button onclick="endQuery()">Clear</button>
            <button onclick="spin()">Spin</button>
            <button onclick="startQuery()">Prompt</button>
        </div>
    </div>
<!--    
   
    <p id="demo"></p>-->
    

    <script>
//    $(document).ready(function(){
//    $('.itextarea').keypress(function(e){
//      if(e.which == 13){
//           // submit via ajax or
//           $(".self").append($(this).val()+"<br/>");
//           $(this).val("");
//           e.preventDefault();
//       }
//    });
//});
//    $(".self").animate({ scrollTop: $(".self")[0].scrollHeight}, 1000);
    $(document).ready(function(){
            function refresh_div() {
                    jQuery.ajax({
                    url:'chatquery.php',
                    type:'POST',
                    success:function(results) {
                        var array =  results.split("\n");
                        var $chat = $(".self");
                        $chat.empty();
                        for(var i=array.length-2; i>-1; i--){
                            $chat.append('<p class="chat-message">'+ array[i] +' </p>');
                        }                         
                       }
                    });
            }
        t = setInterval(refresh_div,100);

    });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var choices = [];
        var choiceCounter = 0;
        var q;
        var choice;
        var data;
        var count =[];
        
        function queryResult(){
            $.ajax({
                type: 'POST',
                url: 'resultquery.php',
                success: function(results4){
                    //alert(results3);
                    $('#result').text("Result: "+results4);
                }
            });
        }

        function startResult(rand){
            $.ajax({
                type: 'POST',
                url: 'result.php',
                data: { 
                    'o':'change',
                    'rand':rand 
                },
                success:function(data) {
                }
            }); 
        }
        function selectChoices() {
            $.ajax({
                type: 'POST',
                url: 'selectchoicequery.php',
                success:function(results2) {
                    count = results2;
                    //var key = Object.keys(count)[1];
                    //  alert( key + " " + count[key] + " " + Object.keys(count).length);
                    //  myFunction();
                }
            });        
        }

        function queryPrompt(){
            $.ajax({
                type: 'POST',
                url: 'promptquery.php',
                success: function(results3){
                    //alert(results3);
                    $('#prompt').text("Prompt: "+results3);
                }
            });
        }

        function clearChoices(){
            $.ajax({
                type: 'POST',
                url: 'clearchoicesquery.php',
                data: { 
                    'm':'change'
                },
                success: function(data){
                }
            });
            count =[];
            myFunction();
        }

        function startQuery(){
            q = prompt("Please enter your question");
            $.ajax({
                type: 'POST',
                url: 'prompt.php',
                data: { 
                    'p':'change',
                    'q':q 
                },
                success:function(data) {
                }
            });        


            //var btn = document.createElement("BUTTON");
            // var t = document.createTextNode("add choice");
            // btn.appendChild(t);
            // document.body.appendChild(btn);
            // btn.onclick = addChoice;

            // var btn2 = document.createElement("BUTTON");
            // var t2 = document.createTextNode("End Query");
            // btn2.appendChild(t2);
            // document.body.appendChild(btn2);
            // btn2.onclick = endQuery;

            // var btn3 = document.createElement("BUTTON");
            // var t3 = document.createTextNode("spin");
            // btn3.appendChild(t3);
            // document.body.appendChild(btn3);
            // btn3.onclick = spin;

            myFunction();
        }


        function addChoice(){
            var choice = prompt("Please enter your choice");
            if(choice!=''){
                $.ajax({
                    type: 'POST',
                    url: 'addchoicequery.php',
                    data: { 
                        'q':'change',
                        'z':choice 
                    },
                    success: function(data){myFunction();
                    }
                });
            }
            else{
                alert("You entered a blank choice.");
                }
            }

            function addChoicex(choice){
            $.ajax({
                type: 'POST',
                url: 'addchoicequery.php',
                data: { 
                    'q':'change',
                    'z':choice 
                },
                success: function(data){myFunction();
                }
            });
        }

        function spin(){
            var x;
            var y;
            var counter = 0;
            var arr = [];
            for(x=0; x<Object.keys(count).length; x++){
                var key = Object.keys(count)[x];
                var value = count[key];
                for(y=0; y<value; y++){
                    arr[counter] = key;
                    counter++;
                }
            }
            var rand = arr[Math.floor(Math.random() * arr.length)];
            alert(rand);
            clearChoices();
            addChoicex(rand);
            startResult(rand);

        }
        var test = setInterval(myFunction,1500);
        
        function myFunction() {
            queryPrompt();
            queryResult();
            selectChoices();
            var myVar = setTimeout(drawChart, 100);  
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Choice');
                data.addColumn('number', 'Votes');

                var i;
                // for(i=0; i<choices.length; i++){
                // data.addRow([choices[i].choice, choices[i].votes]);
                // }
                         //alert("LENGTH OF COUNT: "+Object.keys(count).length);

                for(i=0; i<=Object.keys(count).length; i++){

                    var key = Object.keys(count)[i];
                    var value = count[key];
                    //alert("---->"+key + ", value: " + value);
                    data.addRow([key, parseInt(value)]);

                }
                var options = {
                    title: q,
                    backgroundColor: 'transparent',
                    is3D: true,
                    legend: {textStyle: {color: 'white', fontSize: 12}}
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                function selectHandler() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var row = selectedItem.row;
                        var val = data.getValue(row, 0);
                        $.ajax({
                type: 'POST',
                url: 'addchoicequery.php',
                data: { 
                    'q':'change',
                    'z':val 
                },
                success: function(data){
                }
            });
                        myFunction();
                    }
                }
                google.visualization.events.addListener(chart, 'select', selectHandler);
                chart.draw(data, options);

            }
        }

        function endQuery(){
            var r = confirm("End Query?");
            if (r === true) {
                q = "";
                clearChoices();
                //count = [];
            }       
        }
    </script>
    </body>
</html>