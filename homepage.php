<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Loading Progress Bar with Video Preloader</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}
		#background-video {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -1;
		}
		#loader-container {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 300px;
			height: 30px;
			border: 1px solid orange;
			border-radius: 5px;
			overflow: hidden;
		}
		#loader-bar {
			width: 0%;
			height: 100%;
			background-color: red;
			transition: width 0.5s ease-in-out;
		}
		#loader-bar.complete {
  			background-color: white;
  			transition: background-color 3s ease-in-out;
			}

		#loader-text {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 16px;
			font-weight: bold;
			color: #fff;
		}
		
	</style>
</head>
<body>
	<video id="background-video" autoplay loop muted>
		<source src="spacetravel.mp4" type="video/mp4">
		<!-- Add more video sources as needed -->
	</video>
	<div id="loader-container">
		<div id="loader-bar"></div>
		<div id="loader-text">Loading...</div>
	</div>

	<script>
		var loaderBar = document.getElementById("loader-bar");
		var loaderText = document.getElementById("loader-text");
		

		var progress = 0;
		var intervalId = setInterval(function() {
			progress += Math.floor(Math.random() * 10) +1;

			if (progress > 100) {
				progress = 100;
				
			}

			loaderBar.style.width = progress + "%";
			loaderText.textContent = "Loading " + progress + "%...";

			if (progress >= 100) {
				clearInterval(intervalId);
				window.location.href = "index.php";
			}
		}, 500);

	</script>
</body>
</html>
