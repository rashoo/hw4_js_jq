<html>
	<head>
		<title>SPACE INVADERS</title>
		<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
		<style>
			#gameScreen{
				position: relative;
				background-color: silver;
				overflow: hidden;
			}

			.gameObject{
				position: absolute;
				z-index: 1;
			}

		</style>
	</head>
	<body onload="init()">
		<div id="gameScreen"></div>
		<div id="output">Space Invaders</div>
		
		<script type="text/javascript">
			var gameScreen;
			var output;

			var ship;

			var gameTimer;
			
			// Speed of Background Moves
			var bg1, bg2;
			const BG_SPEED = 4;

			var leftArrowDown = false;
			var rightArrowDown = false;

			const GS_WIDTH = 800;
			const GS_HEIGHT = 600;

			function init(){
			    // gameScreen = document.getElementById('gameScreen');
				// gameScreen.style.width = GS_WIDTH + 'px';
				// gameScreen.style.height = GS_HEIGHT + 'px';

				// output = document.getElementById('output')

                bg1 = document.createElement('IMG');
				bg1.className = 'gameObject';
				bg1.src = 'bg.jpg';
				bg1.style.width = '800px';
				bg1.style.height = '1422px';
				bg1.style.left = '0px';
				bg1.style.top = '0px';

                bg2 = document.createElement('IMG');
				bg2.className = 'gameObject';
				bg2.src = 'bg.jpg';
				bg2.style.width = '800px';
				bg2.style.height = '1422px';
				bg2.style.left = '0px';
				bg2.style.top = '-1422px';	// Separates image to be below 'bg1'

				ship = document.createElement('IMG');
				ship.src = 'ship.gif';
				ship.className = 'gameObject';
				ship.style.width = '68px';
				ship.style.height = '68px';
				ship.style.top = '500px';
				ship.style.left = '366px';
				// gameScreen.appendChild(ship);
			    
			    $("#gameScreen").width(GS_WIDTH).height(GS_HEIGHT);
			    $("#gameScreen").append("<img src='bg.jpg' id='bg1' class='gameObject' height='800px' width='1422px' style='padding-top: 0px; padding-left: 0px;'></img>");
			    $("#gameScreen").append("<img src='bg.jpg' id='bg2' class='gameObject' height='800px' width='1422px' style='padding-top:-1422px; padding-left: 0px;'></img>");
			    $("#gameScreen").append("<img src='ship.gif' id='shipId' class='gameObject' width='68px' height='68px' style='padding-top: 500px; padding-left: 366px'></img>");
			    
			    gameTimer = setInterval(gameloop, 50);
			}
			
			function gameloop(){
				// Background Movement
				var bgY = parseInt(bg1.style.top) + BG_SPEED;
		
				if(bgY > GS_HEIGHT) {
					bg1.style.top = -1 * parseInt(bg1.style.height); // Resets Background
				} else {
					bg1.style.top = bgY + 'px';
				}
				 
				$("#bg1").replaceWith("<img src='bg.jpg' id='bg1' class='gameObject' height='800px' width='1422px' style='padding-top: " + bg1.style.top + "; padding-left: 0px;'></img>");
				
				bgY = parseInt(bg2.style.top) + BG_SPEED;
				
				if(bgY > GS_HEIGHT) {
					bg2.style.top = -1 * parseInt(bg2.style.height);
				} else {
					bg2.style.top = bgY + 'px';
				}
				
				$("#bg2").replaceWith("<img src='bg.jpg' id='bg2' class='gameObject' height='800px' width='1422px' style='padding-top:  " + bg2.style.top + "; padding-left: 0px;'></img>");
				
				if(leftArrowDown){
					var newX = parseInt(ship.style.left);
					if(newX > 0) 
					    ship.style.left = newX - 20 + 'px';
					else
					    ship.style.left = '0px';
					
					$("#shipId").replaceWith("<img src='ship.gif' id='shipId' class='gameObject' width='68px' height='68px' style='padding-top: 500px; padding-left: " + ship.style.left + "'></img>");
			    }

				if(rightArrowDown){
					var newX = parseInt(ship.style.left);
					var maxX = GS_WIDTH - parseInt(ship.style.width);
					if(newX <  maxX) 
					    ship.style.left = newX + 20 + 'px';
					else 
					    ship.style.left = maxX + 'px';
					    
					$("#shipId").replaceWith("<img src='ship.gif' id='shipId' class='gameObject' width='68px' height='68px' style='padding-top: 500px; padding-left: " + ship.style.left + "'></img>");
				}
		    }
			    
		    document.addEventListener('keydown', function(event){
				if(event.keyCode==37) leftArrowDown = true;
				if(event.keyCode==39) rightArrowDown = true;
			});

			document.addEventListener('keyup', function(event){
				if(event.keyCode==37) leftArrowDown = false;
				if(event.keyCode==39) rightArrowDown = false;
			});
		</script>
	</body>
</html>
