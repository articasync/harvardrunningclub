<?php 

  /* All useful html goes in this file */

get_header(); ?>

<div id="banner">
  <div id="quote">
	“To give anything less than your best is to sacrifice the gift.” - Pre
  </div>
  <div id="search">
	<form>	
		<input id="searchbar" type="search" class="search-field" placeholder="Search ..." value name="s" title="Search for:">
	</form>
  </div>
</div>

<div id="title">Harvard College Running Club</div>

<div id="nav">
  <ul>
	<?php 
	  $pages = get_pages();
	  foreach ($pages as $page) 
	  {
		echo '<li data-html=\'' . apply_filters('the_content', $page->post_content) . '\'>' . $page->post_title . '</li>';
	  }
	?>
  </ul>
</div>

<div id="clouds"></div>

<?php get_footer(); ?>