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

        	$_roomname = mysqli_real_escape_string($con,$roomname);
        	$_username = mysqli_real_escape_string($con,$username);
        	$_comment = mysqli_real_escape_string($con,$comment);
            $statement1 = "INSERT into chat (room, user, message) VALUES ('$_roomname', '$_username', '$_comment')";
            if($_comment!=''){mysqli_query($con, $statement1);}
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
                <?php
                    $tempusername = $_SESSION['username']."_list";
                    $statement = "SELECT * from $tempusername";
                    $res = mysqli_query($con, $statement);
                    if($res){
                        while($arr = mysqli_fetch_array($res)){   		
                ?>            
                
            <li>
            	<?php $var = $arr['activerooms'];?>
                <form id ="buttons"><button><?php echo $var; ?></button></form>

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
                    <textarea name="comment" rows="5" cols="40"></textarea>
                    <button type="submit" name="submit" value="Submit">Send</button>  
                </form>
            </div>
        </div>
        <script>
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
        <div>

<button onclick="selectChoices()">Select Choices</button>

<button onclick="clearChoices()">Clear Choices</button>

<button onclick="startQuery()">Start Query</button>

<p id="demo"></p>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    var choices = [];
    var choiceCounter = 0;
    var q;
    var choice;
    var data;
    var count =[];

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


    function clearChoices(){
        $.ajax({
            type: 'POST',
            url: 'clearchoicesquery.php',
            data: { 
                'm':'change',
            },
            success: function(data){
            }
        });
        myFunction();
    }

    function startQuery(){
        q = prompt("Please enter your question");
        var btn = document.createElement("BUTTON");
        var t = document.createTextNode("add choice");
        btn.appendChild(t);
        document.body.appendChild(btn);
        btn.onclick = addChoice;
        
        var btn2 = document.createElement("BUTTON");
        var t2 = document.createTextNode("End Query");
        btn2.appendChild(t2);
        document.body.appendChild(btn2);
        btn2.onclick = endQuery;
        
        var btn3 = document.createElement("BUTTON");
        var t3 = document.createTextNode("spin");
        btn3.appendChild(t3);
        document.body.appendChild(btn3);
        btn3.onclick = spin;
        
        myFunction();
    }
    
    
    function addChoice(){
        var choice = prompt("Please enter your choice");
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

        // if(choice != null && choice != ""){
        //     var c = {choice:choice, votes:1};
        //     choices.push(c);
        // }
        //selectChoices();
        
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

    }

    function myFunction() {
        
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
                title: q
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
        if (r == true) {
            q = "";
            //choices = [];
        }       
    }
</script>


  <head>
    
  </head>
  <body>
    <div id="piechart" style="width: 500px; height: 500px;"></div>
  </body>
  
</div>
</body>
</html>

