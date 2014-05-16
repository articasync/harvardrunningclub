<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  
  <?php //wp_head(); ?>
  
<script>
  /********** My functions **********/
  $(document).ready(function() {
	
	// The maximum supported horizontal resolution, cloud width, and banner height
	var maxres = 1260;
  	var cloud_width = 256;
	var banner_height = $("#banner").height;
	
	// The current weather condition
	var condition = "snow";
	
	// The number of clouds and a helper variable (sorry)
	var clouds = 10;
	var range = (maxres + cloud_width) / clouds;
	
	// Place all clouds dynamically
	for (var i = 0; i < clouds; i++)
	{
	  var offset = Math.floor(i * range + Math.random() * range - cloud_width)
	  $("#clouds").append(
		"<div class='cloud' style='left: " + offset + "px;'> \
		  <img src='http://www.harvardrunningclub.com/wp-content/uploads/2014/05/cloud_tiny" + (i%4 + 1) + ".png' alt=''> \
  		</div>");
	}
	
	// If there is a weather condition
	if (condition != "")
	{
	  // Create a weather box under each cloud for displaying weather
	  $(".cloud").each(function() {
		$(this).append("<div class='weather'></div>");
	  });
	
	  // Add the appropriate weather condition
	  $(".weather").each(function() {
	  var offset = Math.random() * 200 - 320;
	  $(this).append(
		"<div class='condition' style='top: " + offset + "px;'> \
			<img src='http://www.harvardrunningclub.com/wp-content/uploads/2014/05/" + condition + ".png'> \
         </div>");
	  });
	}
	
	// This function is called every 40ms
	setInterval(function() {
	  
	  // Update cloud movement, wrapping around the screen
	  $("#clouds").width($("body").width());
	  $(".cloud").each(function() {
		var pos = $(this).position().left - 1;
	    if (pos < -cloud_width || pos > maxres)
			pos = maxres;
	    $(this).css("left", pos);
	  });
	  
	  // Update weather condition movement
	  $(".condition").each(function() {
		var pos = $(this).position().top + 2;
		if (pos > 100)
		  pos = -120;
		$(this).css("top", pos);
	  });
	  
	}, 40);
	
  });
</script>
  
</head>
<body>