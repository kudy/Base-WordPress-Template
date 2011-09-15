<?php
get_header();
get_sidebar();
?>
				<div id="content" role="main">
<?php
if (have_posts()) {
	while (have_posts()) : the_post();
?>
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
comments_template();
?>
				</div>
<?php
get_footer();
?>
