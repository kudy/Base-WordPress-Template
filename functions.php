<?php
function strlen_utf8 ($str) {
	$i = 0;
	$count = 0;
	$len = strlen ($str);
	while ($i < $len) {
		$chr = ord ($str[$i]);
		$count++;
		$i++;
		if ($i >= $len)
			break;
		if ($chr & 0x80) {
			$chr <<= 1;
			while ($chr & 0x80) {
				$i++;
				$chr <<= 1;
			}
		}
	}
	return $count;
}
function check_email($email) {
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
}
add_action('admin_menu', 'sub_menu_function');
function sub_menu_function() {
    add_theme_page('Navigation Controls', 'Navigation Controls', 'manage_options', 'navigation_controls', 'navigation_controls_panel');
}
function navigation_controls_panel() {
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    if (isset($_POST['exclude_nav_list'])) {
	update_option('exclude_nav_list', $_POST['exclude_nav_list']);
    }
    if (isset($_POST['include_footer_list'])) {
	update_option('include_footer_list', $_POST['include_footer_list']);
    }
    $exclude_nav_list = get_option('exclude_nav_list');
    $include_footer_list = get_option('include_footer_list');
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"></div>
	    <h2>Navigation Controls</h2>
	    <form action="" method="post">
	    <h3>Exclude the following Pages from the Main Navigation:</h3>
	    <input type="text" size="20" name="exclude_nav_list" value="' . $exclude_nav_list . '" /> (comma separated list of page IDs, ex: 1,3,54,790)<br />
	    <h3>Include the following Pages in the Footer:</h3>
	    <input type="text" size="20" name="include_footer_list" value="' . $include_footer_list . '" /> (comma separated list of page IDs, ex: 1,3,54,790)<br /><br />
	    <input type="submit" value="Save" />
	    </form>
    </div>';
}
?>
