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
						<h1><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<div class="postmetadata">Posted 
						<!-- the date and time -->
						on <?php the_time(get_option('date_format')) ?>, <?php the_time(get_option('time_format')) ?>, 
						<!-- post author -->
						by <?php the_author() ?>, 
						<!-- post category -->
						under <?php the_category(', ') ?>.
						</div>
						<div class="entry">
<?php
		the_content('');
?>
						</div>
						<div class="postmetadata">
<?php
		if(function_exists('the_tags')) {
			the_tags(__('Tags: '), ', ', '<br />');
		}
?>
						</div>
					</div>
<?php
	endwhile;
?>
					<div class="navigation">
						<div style="text-align:left"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div style="text-align:right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>
<?php
}
?>
				</div>
<?php
get_footer();
?>

