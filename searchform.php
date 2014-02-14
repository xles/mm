<?php 
/*
if( get_theme_mod( 'post_display_username' ) ) {

} else {
	$placeholder = "Search";
} 
*/
?> 
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<li class="has-form">
	  <div class="row collapse">
	    <div class="large-8 small-9 columns">
	      <input type="text" name="s" placeholder="Search the Den">
	    </div>
	    <div class="large-4 small-3 columns">
		<input type="submit" class="button expand" value="Search">
	    </div>
	  </div>
	</li>
</form>
