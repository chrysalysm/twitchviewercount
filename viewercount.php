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
				margin-right: -7px;
				padding-left: 0px;
			}
		</style>
	</head>
	<body>
		<?php $channel = $_GET["channel"]; ?>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		// Get channel name from URL vars
		var channelname = '<?php echo $channel; ?>';
		// Viewer Counter
		$(document).ready(function() {
			loadViewers();
			function loadViewers() {
				// Grab JSON from Twitch API
				$.ajax({
					type: 'GET',
					url: 'https://api.twitch.tv/kraken/streams/'+channelname,
					headers: {
						'Client-ID': '2wtyco2p60kpki2fluf08kqkp6k2p7b'
					},
					success: function(data) {
					
						if (data['stream'] != null) {
							if (data['streams']) {
								<?php
									if ($style == "anime") {
										echo "$('#viewer_counter').html('<img src=\"0.gif\" />');";
									} elseif ($style == "touhou") {
										echo "$('#viewer_counter').html('<img src=\"touhou_0.gif\" />');";
									} else {
										echo "$('#viewer_counter').html(\"0\");";
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
										for ($x = 0; $x <= 9; $x++) {
										echo "imgArray[$x] = \"$x.gif\";\n\t\t\t\t\t\t\t";
										}
									} elseif ($style == "touhou") {
										for ($x = 0; $x <= 9; $x++) {
											echo "imgArray[$x] = \"touhou_$x.gif\";\n\t\t\t\t\t\t\t";	
										}
									} else {
										echo "";
									}
								?>

								if ((number1 == 0) || number1 == 0 && (number6 + number5 + number4 + number3 + number2) >= 1) {
									number1img = '<img src="'+imgArray[0]+'" />';
								} else if (number1 > 0) {
									number1img = '<img src="'+imgArray[number1]+'" />';
								} else {
									number1img = '';
								}

								if (number2 == 0 && (number6 + number5 + number4 + number3) >= 1) {
									number2img = '<img src="'+imgArray[0]+'" />';
								} else if (number2 > 0) {
									number2img = '<img src="'+imgArray[number2]+'" />';
								} else {
									number2img = '';
								}

								if (number3 == 0 && (number6 + number5 + number4) >= 1) {
									number3img = '<img src="'+imgArray[0]+'" />';
								} else if (number3 > 0) {
									number3img = '<img src="'+imgArray[number3]+'" />';
								} else {
									number3img = '';
								}

								if (number4 == 0 && (number6 + number5) >= 1) {
									number4img = '<img src="'+imgArray[0]+'" />';
								} else if (number4 > 0) {
									number4img = '<img src="'+imgArray[number4]+'" />';
								} else {
									number4img = '';
								}


								if (number5 == 0 && number6 > 1) {
									number5img = '<img src="'+imgArray[0]+'" />';
								} else if (number5 > 0) {
									number5img = '<img src="'+imgArray[number5]+'" />';
								} else {
									number5img = '';
								};

								if (number6 == 0) {
									number6img = '';
								} else if (number6 > 0) {
									number6img = '<img src="'+imgArray[number6]+'" />';
								} else {
									number6img = '';
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
									echo "$('#viewer_counter').html('<img src=\"0.gif\" />');";
								} elseif ($style == "touhou") {
									echo "$('#viewer_counter').html('<img src=\"touhou_0.gif\" />');";
								} else {
									echo "$('#viewer_counter').html(\"0\");";
								}
							?>
						}
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
