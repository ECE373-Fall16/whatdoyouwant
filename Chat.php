
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
	
<div>

<!--<form id="frm1" action="chat.php">
  Enter Question: <input type="text" name="question"><br>
</form> 
-->
<button onclick="startQuery()">Start Query</button>

<p id="demo"></p>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
	
	var choices = [];
	var choiceCounter = 0;
	var q;
	var choice;
	
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
		btn.appendChild(t3);
		document.body.appendChild(btn3);
		//btn3.onclick = spin;
		
		
		myFunction();
	}
	
	
	function addChoice(){
		var choice = prompt("Please enter your choice");
		if(choice != null && choice != ""){
		var c = {choice:choice, votes:1};
		choices.push(c);}
	myFunction();
	}
	
	
function myFunction() {
	
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = new google.visualization.DataTable();
			data.addColumn('string', 'Choice');
			data.addColumn('number', 'Votes');
			
			var i;
			for(i=0; i<choices.length; i++){
			data.addRow([choices[i].choice, choices[i].votes]);
			
			}

        var options = {
          title: q
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		
        chart.draw(data, options);
		
      }
}
function endQuery(){
	var r = confirm("End Query?");
if (r == true) {
    q = "";
	choices = [];
	myFunction();;
} 		
		}
</script>


  <head>
    
  </head>
  <body>
    <div id="piechart" style="width: 500px; height: 500px;"></div>
  </body>
  
</div>
        
        
        
        
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
                <form method="post" action="/WYDW/chat.php">  
                     <textarea name="comment" rows="5" cols="40"><br />
<b>Notice</b>:  Undefined variable: comment in <b>C:\xampp\htdocs\WYDW\Chat.php</b> on line <b>146</b><br />
</textarea>
                     <button type="submit" name="submit" value="Submit">Send</button>  
                 </form>
            </div>
<!--            <form method="post" action="/WYDW/chat.php">  
                <textarea name="comment" rows="5" cols="40"><br />
<b>Notice</b>:  Undefined variable: comment in <b>C:\xampp\htdocs\WYDW\Chat.php</b> on line <b>151</b><br />
</textarea>
                <button type="submit" name="submit" value="Submit">  
            </form>-->
        </div>
    </body>
</html>
