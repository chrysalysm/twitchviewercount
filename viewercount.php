<html>
	<head>
		<title>Twitch Viewer Counter</title>
		<style>
			<?php $color = $_GET["color"]; if (!isset($color)) { $color = "Black"; } ?>
			<?php $size = $_GET["size"]; if (!isset($size)) { $size = "90"; } ?>
			<?php $family = $_GET["family"]; if (!isset($family)) { $family = "Tahoma"; } ?>
			<?php
				$style = $_GET["style"]; if (!isset($style)) { $style = "none"; }
				$style = strtolower($style); 
			?>
			<?php $debug = $_GET["debug"]; ?>
			body {
				font-size: <?php echo $size; ?>px;
				font-family: <?php echo $family; ?>;
				color: <?php echo $color; ?>;
				letter-spacing: -2px;
		  	}
			img {
				margin-left: -5px;
			}
		</style>
	</head>
	<body>
		<?php $channel = $_GET["channel"]; ?>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		// Get channel name from URL vars
		var channelname = "<?php echo $channel; ?>";
		// Viewer Counter
		$(document).ready(function() {
			loadViewers();
			function loadViewers() {
				// Grab JSON from Twitch API
				$.getJSON('https://api.twitch.tv/kraken/streams/'+encodeURIComponent(channelname)+"?callback=?", function(data) {
					if (data["stream"] != null) {
						if (data['streams']) {
							<?php
								if ($style == "anime") {
									echo "$('#viewer_counter').html('<img src=\"1.gif\" />');";
								} elseif ($style == "touhou") {
									echo "$('#viewer_counter').html('<img src=\"touhou_1.gif\" />');";
								} else {
									echo "$('#viewer_counter').html(\"1\");";
								}
							?>
						} else {
							<?php 
								if (!isset($debug)) {
									echo "var viewer_count = data['stream']['viewers'];";
								} else {
									echo "var viewer_count = ".$debug.";";
								}
							?>
							var number = viewer_count;
							var number6 = (number - (number % 100000)) / 100000;
							var number5 = ((number % 100000) - ((number % 100000) % 10000)) / 10000;
							var number4 = ((number % 10000) - ((number % 10000) % 1000)) / 1000;
							var number3 = ((number % 1000) - ((number % 1000) % 100)) / 100;
							var number2 = ((number % 100) - ((number % 100) % 10)) / 10;
							var number1 = ((number % 10) - ((number % 10) % 1)) / 1;
							var number1img, number2img, number3img, number4img, number5img, number6img;

							imgArray = new Array();

							<?php
								if ($style == "anime") {
									echo "imgArray[0] = \"0.gif\";";
									echo "imgArray[1] = \"1.gif\";";
									echo "imgArray[2] = \"2.gif\";";
									echo "imgArray[3] = \"3.gif\";";
									echo "imgArray[4] = \"4.gif\";";
									echo "imgArray[5] = \"5.gif\";";
									echo "imgArray[6] = \"6.gif\";";
									echo "imgArray[7] = \"7.gif\";";
									echo "imgArray[8] = \"8.gif\";";
									echo "imgArray[9] = \"9.gif\";";
								} elseif ($style == "touhou") {
									echo "imgArray[0] = \"touhou_0.gif\";";
									echo "imgArray[1] = \"touhou_1.gif\";";
									echo "imgArray[2] = \"touhou_2.gif\";";
									echo "imgArray[3] = \"touhou_3.gif\";";
									echo "imgArray[4] = \"touhou_4.gif\";";
									echo "imgArray[5] = \"touhou_5.gif\";";
									echo "imgArray[6] = \"touhou_6.gif\";";
									echo "imgArray[7] = \"touhou_7.gif\";";
									echo "imgArray[8] = \"touhou_8.gif\";";
									echo "imgArray[9] = \"touhou_9.gif\";";
								} else {
									echo "";
								}
							?>

							if ((number1 == 0) || number1 == 0 && (number6 + number5 + number4 + number3 + number2) >= 1) {
								number1img = '<img src="'+imgArray[0]+'" />';
							} else if (number1 == 1) {
								number1img = '<img src="'+imgArray[1]+'" />';
							} else if (number1 == 2) {
								number1img = '<img src="'+imgArray[2]+'" />';
							} else if (number1 == 3) {
								number1img = '<img src="'+imgArray[3]+'" />';
							} else if (number1 == 4) {
								number1img = '<img src="'+imgArray[4]+'" />';
							} else if (number1 == 5) {
								number1img = '<img src="'+imgArray[5]+'" />';
							} else if (number1 == 6) {
								number1img = '<img src="'+imgArray[6]+'" />';
							} else if (number1 == 7) {
								number1img = '<img src="'+imgArray[7]+'" />';
							} else if (number1 == 8) {
								number1img = '<img src="'+imgArray[8]+'" />';
							} else if (number1 == 9) {
								number1img = '<img src="'+imgArray[9]+'" />';
							} else {
								number1img = '';
							};

							if (number2 == 0 && (number6 + number5 + number4 + number3) >= 1) {
								number2img = '<img src="'+imgArray[0]+'" />';
							} else if (number2 == 1) {
								number2img = '<img src="'+imgArray[1]+'" />';
							} else if (number2 == 2) {
								number2img = '<img src="'+imgArray[2]+'" />';
							} else if (number2 == 3) {
								number2img = '<img src="'+imgArray[3]+'" />';
							} else if (number2 == 4) {
								number2img = '<img src="'+imgArray[4]+'" />';
							} else if (number2 == 5) {
								number2img = '<img src="'+imgArray[5]+'" />';
							} else if (number2 == 6) {
								number2img = '<img src="'+imgArray[6]+'" />';
							} else if (number2 == 7) {
								number2img = '<img src="'+imgArray[7]+'" />';
							} else if (number2 == 8) {
								number2img = '<img src="'+imgArray[8]+'" />';
							} else if (number2 == 9) {
								number2img = '<img src="'+imgArray[9]+'" />';
							} else {
								number2img = '';
							};

							if (number3 == 0 && (number6 + number5 + number4) >= 1) {
								number3img = '<img src="'+imgArray[0]+'" />';
							} else if (number3 == 1) {
								number3img = '<img src="'+imgArray[1]+'" />';
							} else if (number3 == 2) {
								number3img = '<img src="'+imgArray[2]+'" />';
							} else if (number3 == 3) {
								number3img = '<img src="'+imgArray[3]+'" />';
							} else if (number3 == 4) {
								number3img = '<img src="'+imgArray[4]+'" />';
							} else if (number3 == 5) {
								number3img = '<img src="'+imgArray[5]+'" />';
							} else if (number3 == 6) {
								number3img = '<img src="'+imgArray[6]+'" />';
							} else if (number3 == 7) {
								number3img = '<img src="'+imgArray[7]+'" />';
							} else if (number3 == 8) {
								number3img = '<img src="'+imgArray[8]+'" />';
							} else if (number3 == 9) {
								number3img = '<img src="'+imgArray[9]+'" />';
							} else {
								number3img = '';
							};

							if (number4 == 0 && (number6 + number5) >= 1) {
								number4img = '<img src="'+imgArray[0]+'" />';
							} else if (number4 == 1) {
								number4img = '<img src="'+imgArray[1]+'" />';
							} else if (number4 == 2) {
								number4img = '<img src="'+imgArray[2]+'" />';
							} else if (number4 == 3) {
								number4img = '<img src="'+imgArray[3]+'" />';
							} else if (number4 == 4) {
								number4img = '<img src="'+imgArray[4]+'" />';
							} else if (number4 == 5) {
								number4img = '<img src="'+imgArray[5]+'" />';
							} else if (number4 == 6) {
								number4img = '<img src="'+imgArray[6]+'" />';
							} else if (number4 == 7) {
								number4img = '<img src="'+imgArray[7]+'" />';
							} else if (number4 == 8) {
								number4img = '<img src="'+imgArray[8]+'" />';
							} else if (number4 == 9) {
								number4img = '<img src="'+imgArray[9]+'" />';
							} else {
								number4img = '';
							};

							if (number5 == 0 && number6 > 1) {
								number5img = '<img src="'+imgArray[0]+'" />';
							} else if (number5 == 1) {
								number5img = '<img src="'+imgArray[1]+'" />';
							} else if (number5 == 2) {
								number5img = '<img src="'+imgArray[2]+'" />';
							} else if (number5 == 3) {
								number5img = '<img src="'+imgArray[3]+'" />';
							} else if (number5 == 4) {
								number5img = '<img src="'+imgArray[4]+'" />';
							} else if (number5 == 5) {
								number5img = '<img src="'+imgArray[5]+'" />';
							} else if (number5 == 6) {
								number5img = '<img src="'+imgArray[6]+'" />';
							} else if (number5 == 7) {
								number5img = '<img src="'+imgArray[7]+'" />';
							} else if (number5 == 8) {
								number5img = '<img src="'+imgArray[8]+'" />';
							} else if (number5 == 9) {
								number5img = '<img src="'+imgArray[9]+'" />';
							} else {
								number5img = '';
							};

							if (number6 == 0) {
								number6img = '';
							} else if (number6 == 1) {
								number6img = '<img src="'+imgArray[1]+'" />';
							} else if (number6 == 2) {
								number6img = '<img src="'+imgArray[2]+'" />';
							} else if (number6 == 3) {
								number6img = '<img src="'+imgArray[3]+'" />';
							} else if (number6 == 4) {
								number6img = '<img src="'+imgArray[4]+'" />';
							} else if (number6 == 5) {
								number6img = '<img src="'+imgArray[5]+'" />';
							} else if (number6 == 6) {
								number6img = '<img src="'+imgArray[6]+'" />';
							} else if (number6 == 7) {
								number6img = '<img src="'+imgArray[7]+'" />';
							} else if (number6 == 8) {
								number6img = '<img src="'+imgArray[8]+'" />';
							} else {
								number6img = '<img src="'+imgArray[9]+'" />';
							};

							<?php
								if ($style == "anime") {
									echo "$('#viewer_counter').html(number6img + number5img + number4img + number3img + number2img + number1img);";
								} elseif ($style == "touhou") {
									echo "$('#viewer_counter').html(number6img + number5img + number4img + number3img + number2img + number1img);";
								} else {
									echo "$('#viewer_counter').html(viewer_count);";
								}
							?>

						}
					} else {
						<?php
							if ($style == "anime") {
								echo "$('#viewer_counter').html('<img src=\"1.gif\" />');";
							} elseif ($style == "touhou") {
								echo "$('#viewer_counter').html('<img src=\"touhou_1.gif\" />');";
							} else {
								echo "$('#viewer_counter').html(\"1\");";
							}
						?>
					}
				});
			}
			<?php $seconds = $_GET["seconds"]; if (!isset($seconds)) { $seconds = "10"; } ?>
			setInterval( function() { loadViewers(); }, <?php echo $seconds*1000 ?>);
		});
		</script>
		<div id="viewer_counter">Loading...</div>
	</body>
</html>
