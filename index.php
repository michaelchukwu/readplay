<?php session_start();
if($_SESSION['id']==""){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>readPlay</title>
	<link rel="stylesheet" type="text/css" href="read.css">
	<!-- <script src="quest.js"></script> -->
	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/jquery-modal/jquery.modal.js"></script>
	<link rel="stylesheet" href="node_modules/jquery-modal/jquery.modal.css">
</head>
<body>
	<div class="layout" style="text-align:center;">
		<!-- scoreboard -->
		<table class="scoreboard">
			<tr>
				<th>Score</th> <!--(<0 to 42) 
						  Additions (+2points for click on valid symbol and providing right text)
						  Subtractions (-1point for click on wrong symbol and providing no/wrong text-->
				<th>Live</th> <!--according to score (0-10=poor) (10-24=fair) (25-35=good) (36-41= great) (42=excellent)-->
			</tr>
			<tr><td id="score"></td><td id="level"></td></tr>
		</table>
		<!-- timer -->
		<table class="timer">
			<tr>
				<th>Timer</th> <!--shows count down to 15 minutes (standard game duration)-->
			<tr><td><?php echo $_SESSION['game'];?></td></tr>
		</table>

		<!-- The Modal -->
		<div id="modal2" class="modal"><!-- Modal content -->
  			<div class="modal-content">
				<form method="post">
					Reference Text: <!--FACELESS--><input type="text" name="text">
					<input type="submit" value="go" name="go">
				</form>
  			</div>
  		</div>
	
		<div id="modal" class="modal">
			<div id="questions"></div>
			<form id="answerform"><input type="text" name="answer" id="answer"><input type="submit" value="send" ></form>
			<div id="correct"></div>
		</div>
	
		<div id="modal7" class="modal">
			<div class="modal-content">
  				<form method="post">
					 Reference Text: <!--HARVEST OF CORRUPTION--><input type="text" name="text">
					<input type="submit" value="go" name="go">
  				</form>
  			</div>
		</div>
		
	
		<div id="modal3" class="modal">
			<div class="modal-content">
  				MISS<img src="miss.gif">
  			</div>
		</div>
		<!-- I had to take out the modals for images below for readabilty since you said I only need 1 but I left the other two above so you can see what I did earlier -->
		<a href="" onclick="showQuestion(1)"><img src="street.png"  class="iok" id="click2"></a><!--faceless-->
		
		<a href="" onclick="showQuestion('')"><img src="sun.png"  class="ibig" id="click3"><!--miss-->
		
		<a  href="" onclick="showQuestion(2)"><img src="thief.png"  class="iok" id="click7"><!--harvest of corruption-->
		
		<a href="" onclick="showQuestion('')"><img src="plane.gif"  class="ibig" id="click4"><!--MISS--></a>
		
		<a href="" onclick="showQuestion('')"><img src="torch.png"  class="iok" id="click5"><!--MISS--></a>
					
		<a href="" onclick="showQuestion('')"><img src="foot.png"  class="ibig" id="click6"><!--MISS--></a>
			
		<a href="" onclick="showQuestion('')"><img src="read.png"  class="ibig" id="click1"><!--MISS--></a>
			
		<a href="" onclick="showQuestion('')"><img src="run.png"  class="ibig" id="click8"><!--MISS--></a>
			
		<a href="" onclick="showQuestion('')"><img src="gift.png"  class="iok" id="click9"><!--MISS--></a>
	
		<a href="" onclick="showQuestion('')"><img src="win.png"  class="iok" id="click10"><!--MISS--></a>
	
		<a  href="" onclick="showQuestion(3)"><img src="beach3.png"  class="ibig boss" id="click11"><!--answer = THE LAST GOOD MAN--></a>		
			
		<a  href="" onclick="showQuestion(4)"><img src="love.gif"  class="iok boss" id="click12"><!--answer = SHE STOOPS TO CONQUER--></a>
			
		<a  href="" onclick="showQuestion('')"><img src="money.gif"  class="ibig boss" id="click13"><!--MISS--></a>
		
		<a  href="" onclick="showQuestion(5)"><img src="house.png"  class="ibig boss" id="click14"><!--answer = A RAISIN IN THE SUN--></a>
				
		<a  href="" onclick="showQuestion(6)"><img src="diamond.png"  class="iok boss" id="click15"><!--answer = THE BLOOD OF A STRANGER--></a>
		
		<a  href="" onclick="showQuestion(7)"><img src="sword.png"  class="ibig boss" id="click16"><!--answer = OTELLO--></a>
			
		<a  href="" onclick="showQuestion(8)"><img src="slave.png"  class="iok boss" id="click17"><!--answer = NATIVE SOM--></a>
						
		<a  href="" onclick="showQuestion(9)"><img src="widow.png"  class="iok boss" id="click18"><!--answer = LONELY DAYS--></a>
	</div>
	<script>
		var life = 4;
		document.getElementById('score').innerHTML = 0;
		document.getElementById('level').innerHTML = life;
		function showQuestion(str) {
			event.preventDefault();
			var xhttp;  
			if (str == "") {
				$("#modal3").modal();
				lifeDecrease();
				return;
			}
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("questions").innerHTML = this.responseText;
					$("#modal").modal({
						fadeDuration: 100,
						fadeDelay: 0.50
					});
				}
			};
			xhttp.open("GET", "getquestion.php?q="+str, true);
			xhttp.send();
		}
		$(document).ready(function(){
			$("#answerform").submit(function(event){
				event.preventDefault();
				var dataForm = {
					'answer' : $('#answer').val(),
					'id' : $('#id').val()
				}
				
				$.ajax({
					type: 'GET',
					url: 'answer.php',
					data: dataForm,
					dataType: 'json',
					encode: 'json'
				}).done(function(data){
					$("#score").html(data['score']);
					$("#correct").html(
						data['message']+" <br> <a href='#' rel='modal:close'>continue</a>");
					if(data['message']=='Incorrect!'){
						lifeDecrease();
					}
				});
			});
		});



		function lifeDecrease(){
			if(life == 0){
				window.location = "logout.php";
			}else{
				document.getElementById('level').innerHTML = life--
			}
		}
	</script>
</body>
</html>