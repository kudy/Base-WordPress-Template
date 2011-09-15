				<div id="footer">
<?php
$include_footer_list = get_option('include_footer_list');
if ($include_footer_list != "") {
?>
					<p class="floatleft">
<?php
	$include_footer_list = explode(",",$include_footer_list);
	$output;
	foreach ($include_footer_list as $page) {
		$output .= "						<a href='" . get_permalink($page) . "' title='" . get_the_title($page) . "'>" . get_the_title($page) . "</a> | \n";
	}
	$output = substr($output, 0, -4);
	$output .= "\n";
	echo $output;
?>
					</p>
					<div class="clearboth"></div>
<?php 
}
?>
				</div>
			</div>
		</div>
<?php
wp_footer();
echo "\n";
?>
	</body>
</html>
