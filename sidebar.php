<?php
$subnav;
$arguments = "title_li=&depth=1&echo=0";
if ($exclude_nav_list != "") {
	$arguments .= "&exclude=";
	$arguments .= $exclude_nav_list;
}
if($post->post_parent)   {
	$arguments .= "&child_of=";
	$arguments .= $post->post_parent;
}
else  {
	$arguments .= "&child_of=";
	$arguments .= $post->ID;
}
$subnav = wp_list_pages($arguments);
?>
				<div id="sidebarleft_wrapper">
					<div id="sidebarleft">

<?php
if ($subnav && is_page()) {
?>
						<div id='subnav_box'>
							<ul>
<?php
	echo $subnav;
?>
							</ul>
						</div>
<?php
}
?>
					</div>
				</div>
