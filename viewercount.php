<html>
	<head>
		<title>Twitch Viewer Counter</title>
		<style>
		<! -- Get URL vars & default values -->
		<?php $color = $_GET["color"]; if (!isset($color)) { $color = "Black"; } ?>
		<?php $size = $_GET["size"]; if (!isset($size)) { $size = "90"; } ?>
		<?php $family = $_GET["family"]; if (!isset($family)) { $family = "Tahoma"; } ?>
			<!-- Set CSS -->
			body {
				font-size: <?php echo $size; ?>px;
				font-family: <?php echo $family; ?>;
				color: <?php echo $color; ?>;
				letter-spacing: -5px;
		  }
		</style>
	</head>
	<body>
	  <?php $channel = $_GET["channel"]; ?>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		// Get channel name from URL vars
		var username = "<?php echo $channel; ?>";
		// Viewer Counter
		$(document).ready(function() {
			loadViewers();
			function loadViewers() {
			// Grab JSON from Twitch API
				$.getJSON('https://api.twitch.tv/kraken/streams/'+encodeURIComponent(username)+"?callback=?", function(data) {
					// validate there is data
					if (data["stream"] != null) {
					if (data['streams']) {
						$('#viewer_counter').html("Channel offline.");
					} else {
					  // Get viewer count from JSON
						var viewer_count = data['stream']['viewers'];
						$('#viewer_counter').html(viewer_count);
					}
				} else {
					$('#viewer_counter').html("Channel offline.");
				}
			});
		}
		// Updates once every 10 seconds (1 sec = 1000)
			setInterval(function(){
				loadViewers();
			}, 10000);
		});
		</script>
		<div id="viewer_counter">Loading...</div>
	</body>
</html>
