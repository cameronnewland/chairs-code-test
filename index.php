<html>
<head>
	<title>100 Chairs</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<style>

		body {
			padding:15%;
			width:70%;
			height:85%;
			margin:0;
			font-family:'Open Sans';
			color:#fff;
			text-shadow:0 0 5px rgba(0,0,0,0.7);
			font-size:150%;
		}

		#answer {
			font-weight:bold;
			margin:5% 0;
			display:block;
			font-size:200%;
		}

		#the-play-by-play {
			font-style: italic;
			display:block;
			margin:5% 0;
		}

		#okplayer {
		left: -40% !important;
		top: -40% !important;
		height: 180% !important;
		width: 180% !important;
		}

		h1 span {
			font-size:80%;
		}

		h2 {
			font-size:90%;
			margin-left:10%;
			display:block;
		}

	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="/okvideo.min.js"></script>
	<script>

$(document).ready(function(){
	var chairs = [];

	// Creates chairs array and fills it with 100 chairs 
	for (i=0; i < 100; i++) {
		chairs[i] = (i+1);
	}

	// Creates toggler that will tell the function whether to dismiss or skip
	var oddEvenToggler = true;

	// The function to recursively iterate over until the array is reduced to one final element
	function theLoop(){
		for (k=0;k<chairs.length;k++) {		
			if (oddEvenToggler) {
				$('#the-play-by-play').append("<p>Dismissing chair #"+chairs[k]+". "+(chairs.length-1)+" chairs remain.<p>");
				// Dismisses person in chair
				chairs.splice(k,1);
				oddEvenToggler = false;
				k--
			} else { // Skips person in chair 
				$('#the-play-by-play').append("<p>Skipping chair #"+chairs[k]+". "+(chairs.length-1)+" chairs remain.<p>");
				oddEvenToggler = true;
			}
		}
	}

	// Executes theLoop until the array is reduced to one final element
	while (chairs.length > 1) {
		theLoop();
	}

	$("#answer").html("The survivor is sitting in chair #"+chairs[0]+".<br><br>Here's how it all went down:");

	$(function(){
	  $.okvideo({ source: 'https://www.youtube.com/watch?v=N3S0DFuM3aQ',
	  				adproof: true,
	  				volume: 100,
	  				highdef: true }) 
	});

});
	</script>
</head>
<body>

	<h1>chair<span> (n.)</span></h1>

	<h2>a seat, especially for one person, usually having four legs for support and a rest for the back and often having rests for the arms.</h2>

	<h3>The assignment</h3>

	<p>You are in a room with a circle of 100 chairs.  The chairs are numbered sequentially from 1 to 100.</p>

	<p>At some point in time, the person in chair #1 will be asked to leave.  The person in chair #2 will be skipped, and the person in chair #3 will be asked to leave. This pattern of skipping one person and asking the next to leave will keep going around the circle until there is one person left... the survivor.</p>

	<p>Write a program to determine which chair the survivor is sitting in.</p>

	<span id="answer"></span>
	<span id="the-play-by-play"></span>

</body>
</html>