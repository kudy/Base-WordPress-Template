<?php
/*
Template Name: Home
*/
?>
<?php
get_header();
?>
				<div id="content_home" role="main">
<?php
if (have_posts()) {
	while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="entry">
<?php
		the_content('');
?>
						</div>
					</div>
<?php
	endwhile;
}
?>
				</div>
<?php
get_footer();
?>
