<?php
get_header();
get_sidebar();
?>
				<div id="content">
<?php
if (have_posts()) { 
	while (have_posts()) : the_post();
?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h1><?php the_title(); ?></h1>
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
		the_content('Read the rest of this entry &raquo;');
?>
						</div>
					</div>
<?php
	endwhile;
?>
					<div class="navigation">
						<div style="text-align:left;"><?php previous_post_link('&laquo; %link') ?></div>
						<div style="text-align:right;"><?php next_post_link('%link &raquo;') ?></div>
					</div>
<?php
}
?>
				</div>
<?php
get_footer();
?>
