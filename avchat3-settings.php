<?php
/*
Copyright (C) 2009-2017, avchat.net

This WordPress Plugin is distributed under the terms of the GNU General Public License.
You can redistribute it and/or modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, either version 3 of the License, or any later version.

You should have received a copy of the GNU General Public License
along with this plugin.  If not, see <http://www.gnu.org/licenses/>.
 */

global $wp_roles;
global $wpdb;

$table_permissions = $wpdb->prefix . "community_lite_permissions";
$table_general_settings = $wpdb->prefix . "community_lite_general_settings";

$permissions = array(
	'can_access_chat' => 'Can access chat user interface',
	'can_access_admin_chat' => 'Can access chat admin interface',
	'can_publish_audio_video' => 'Can broadcast their webcam',
	'can_stream_private' => 'Can stream private ',
	'can_send_files_to_rooms' => 'Can send files to rooms ',
	'can_send_files_to_users' => 'Can send files to users ',
	'can_pm' => 'Can send private messages',
	'can_create_rooms' => 'Can create rooms',
	'can_watch_other_people_streams' => 'Can view webcams',
	'can_join_other_rooms' => 'Can join other rooms',
	'show_users_online_stay' => 'Show users how much they stayed online ',
	'view_who_is_watching_me' => 'Ability for the users to see who is watching them ',
	'can_block_other_users' => 'Can block other users ',
	'can_buzz' => 'Can buzz ',
	'can_stop_viewer' => 'Can stop viewer ',
	'can_ignore_pm' => 'Can ignore private messages ',
	'typing_enabled' => 'Can send text messages',
);

$permissions_description = array(
	'can_access_chat' => 'Decide who will have access to the AVChat user interface.',
	'can_access_admin_chat' => 'Decide who will have access to the AVChat admin interface. This interface has many other features, like ban and kick.',
	'can_publish_audio_video' => 'Allow publishing of audio & video streams for:',
	'can_stream_private' => 'When a user makes his stream private, other users need to request permission.',
	'can_send_files_to_rooms' => "Whether or not users with this user role can send files to rooms.",
	'can_send_files_to_users' => "Whether or not users with this user role can send files to other users.",
	'can_pm' => 'Can initiate private discussions between users.',
	'can_create_rooms' => 'Has the ability to create new rooms.',
	'can_watch_other_people_streams' => "Who should watch other people's stream?",
	'can_join_other_rooms' => 'Permit users to join other rooms from the rooms list.',
	'show_users_online_stay' => 'Show users how much they stayed online in the upper menu.',
	'view_who_is_watching_me' => 'The users list will have a separated tab for viewers.',
	'can_block_other_users' => 'A blocked user cannot send you messages or view your camera.',
	'can_buzz' => 'Buzzing creates a distinctive loud sound.',
	'can_stop_viewer' => "With this feature enabled, a user can stop other users from viewing him/her.",
	'can_ignore_pm' => 'Who should be able to ignore private messages.',
	'typing_enabled' => "Disallowing certain user roles from sending text chat messages, you can transform them into simple viewers.",
);

$settings = array(
	/*'free_video_time' => 'Free video time',*/
	'drop_in_room' => 'Drop in room',
	'max_streams' => 'Max streams a user can watch',
	'max_rooms' => 'Max rooms one can be in',
	'username_prefix' => 'Username prefix ',
);

$settings_description = array(
	/*'free_video_time' => "The ammount of time <code>in seconds</code> a user can watch other streams in 1 day.",*/
	'drop_in_room' => "In which room should the user be pushed automatically on login. If left empty, the user will be presented with a list of rooms. Use a comma separated, square brakets contained, list of room IDs for multiple rooms. For example: to drop all users with a user role in the room with ID of r0, type <code>r0</code> in the input box for that user role. Use <code>[r0,r1,r2]</code> for multiple rooms. You can get a room IDs from the Rooms Panel in the AVChat admin interface.",
	'max_streams' => "Maximum number of streams a user can watch simultaneously.",
	'max_rooms' => "The maximum number of rooms a user can be in at the same time.",
	'username_prefix' => "This prefix will be added to all usernames automatically while inside AVChat. Use it to distinguish users with certain user roles. For exemple, for visitors, you could use: <code>VISITOR_</code>",
);

$general_settings = array(
	'connection_string' => 'Connection string*',
	'invite_link' => 'Invite URL ',
	'disconnect_link' => 'Disconnect button URL ',
	'login_page_url' => 'Login page URL',
	'register_page_url' => 'Register page URL',
	'text_char_limit' => 'Text chat character limit',
	'history_lenght' => 'History length',
	'flip_tab_menu' => 'Position of rooms menu',
	'hide_left_side' => 'Hide left side of chat ',
	'p2t_default' => 'Push 2 talk used by default ',
	'display_mode' => 'How AVChat opens',
	'allow_facebook_login' => 'Allow visitors to login using social accounts',

	'preview_youtube_videos' => 'Preview images and YouTube videos by default',
	'right_to_left' => 'Right to left',
	'show_avatars' => 'Show avatars in text chat',
	/*'background_img_url' => 'Background image URL',*/
	'enable_webcam_docking' => 'Enable webcam docking',
	'display_username_realname' => 'Username or real name',
	'users_list_type' => 'Users list type',
	'audio_video_quality' => 'Video quality',
);

$general_settings_description = array(
	'connection_string' => "Required. Enter the RTMP connection string to the avchat30 app on your media server.\nExample: <code>rtmp://my-media-server.com/avchat30/_definst_</code>",
	'invite_link' => "The invite link shown in the share window panel inside AVChat.\nIf left empty, AVChat will try to detect the link automatically.",
	'disconnect_link' => "The user will be taken to this URL when he will press the Leave/Disconnect button in the top right of the chat area.\nLeaving it empty will make the button disabled.",
	'login_page_url' => "The link where users will be taken to when clicking login buttons in AVChat.\nAVChat will require the user to login if visitors do not have access to the chat.\nCheck the Visitors permissions under Permissions & User Roles.",
	'register_page_url' => "The link where users will be taken to when clicking register buttons in AVChat.",
	'text_char_limit' => "Maximum number of characters a text message can contain. <code>Defaults to 200</code>.",
	'history_lenght' => "The number of previous chat lines the user will see when he enters a room. <code>Defaults to 20</code>.",
	'flip_tab_menu' => "Where should the room tabs be positioned relative to the text chat area.\nOn top of it or at the bottom.",
	'hide_left_side' => "Hides the users list and the start webcam button.\nUse this option if you want to create a chat room with no audio/video streams and no users list.",
	'p2t_default' => "When push 2 talk is on, you have to click a button to send audio.\nWhen it's off, you will always broadcast audio. The user can always switch between push 2 talk and always broadcast.",
	'display_mode' => "When the chat is accessed from a desktop browser should the chat be embedded in the page (or blog post) or should it open in a pop-up window (in which case the page/blog post will contain a launch button). If accessed from mobile devices a launch button for the mobile version will always be shown regardless of this setting.",
	'allow_facebook_login' => "Whether or not the other account authentication options (Facebook, Twitter) are enabled for visitors.",

	'preview_youtube_videos' => "Should YouTube videos and images be previewed by default.",
	'right_to_left' => 'Enable RTL mode for RTL languages',
	'show_avatars' => 'Whether or not the user avatars are shown in the text chat.',
	/*'background_img_url' => 'Use a custom image for chat background.',*/
	'enable_webcam_docking' => "This setting controls whether or not the newly opened video stream will be automatically docked\nabove the textchat window. By default this is disabled.",
	'display_username_realname' => 'Use usernames or real names inside AVChat.',
	'users_list_type' => "Controls the view type of the user list. Available options are: Small, Small with thumbnail and Big with thumbnail.\nIf BuddyPress is installed, <code>Big with thumbnail</code> will be used, regradless of this option.",
	'audio_video_quality' => "Select the quality of the audio/video stream. Higher values need a better Internet connection.\nThe higher the upload bandwidth and the lower the latency, the better.\nHD options are included with the Community PRO version.",
);

if (isset($_POST) && !empty($_POST)) {
	foreach ($_POST as $key => $avconfs) {
		if (strpos($key, "-")) {
			$avconf_arrtemp = explode("-", $key);
			if ($avconfs == 'on') {
				$avconfs = '1';
			}

			$avconf_arr[$avconf_arrtemp[0]][substr($avconf_arrtemp[1], 4)] = $avconfs;
		} else {
			$av_general_confs[substr($key, 11)] = $avconfs;
		}
	}

	foreach ($avconf_arr as $key => $vals) {
		$updateString = "";
		foreach ($permissions as $pkey => $pvalue) {
			if (!array_key_exists($pkey,$vals) || (array_key_exists($pkey,$vals) && $vals[$pkey] == "")) {
				$vals[$pkey] = 0;
			}
			$updateString .= $pkey . " = '" . $vals[$pkey] . "', ";
		}

		$i = 1;
		foreach ($settings as $skey => $svalue) {
			$updateString .= $skey . " = '" . stripslashes(trim($vals[$skey])) . "'";
			if (count($settings) != $i) {
				$updateString .= ', ';
			}

			$i++;
		}

		$query = "UPDATE " . $table_permissions . " SET " . $updateString . " WHERE user_role = '" . $key . "'";
		$wpdb->query($query);
	}

	$updateString = "";
	$p = 1;
	foreach ($av_general_confs as $gkey => $gvalue) {
		$updateString .= $gkey . " = '" . stripslashes(trim($gvalue)) . "'";
		if (count($av_general_confs) != $p) {
			$updateString .= ', ';
		}

		$p++;
	}

	$query = "UPDATE " . $table_general_settings . " SET " . $updateString;
	//var_dump($query);
	$wpdb->query($query);
}

$location = get_option('siteurl') . '/wp-admin/admin.php?page=avchat-3/avchat3-settings.php';
$user_roles = array();

foreach ($wp_roles->roles as $role => $details) {
	$user_roles[$role] = $details["name"];
}

$user_roles['visitors'] = "Visitors";

/*
 * Start displaying control messsages.
 * Used for checking if AVChat software has been uploaded.
 */

function check_for_avchat_folder() {
	$needed_directory = plugin_dir_path(__FILE__) . 'audio_video_quality_profiles';

	$output_message = <<<EOT
			<div class='error form-invalid'>
				<p>Just a small step to finish: you need to upload the actual AVChat software in the plugin's <code>wp-contents/plugins/avchat-3</code> folder, check Part 2 from the <a href='https://wordpress.org/plugins/avchat-3/installation/' target='_blank'>plugin's installation instructions</a> (on wordpress.org). You can <a href="http://avchat.net/buy-now?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-buy&utm_campaign=avchat-wp-lite" target='_blank'>purchase AVChat</a> or get a free 15 days trial from <a href='http://avchat.net/15daystrial/?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-request-trial&utm_campaign=avchat-wp-lite' target='_blank'>here</a>.
				</p>
			</div>
EOT;

	if (file_exists($needed_directory)) {
		// AVChat Is Present. Do nothing. Yet. 
	} else {
		return $output_message;
	}
} // End checking for AVChat software

?>
<script type="text/javascript">
(function(){var g=function(a){if(a&&a.stopPropagation)a.stopPropagation();else window.event.cancelBubble=true;var b=a?a:window.event;b.preventDefault&&b.preventDefault()},d=function(a,c,b){if(a.addEventListener)a.addEventListener(c,b,false);else a.attachEvent&&a.attachEvent("on"+c,b)},a=function(c,a){var b=new RegExp("(^| )"+a+"( |$)");return b.test(c.className)?true:false},j=function(b,c,d){if(!a(b,c))if(b.className=="")b.className=c;else if(d)b.className=c+" "+b.className;else b.className+=" "+c},h=function(a,b){var c=new RegExp("(^| )"+b+"( |$)");a.className=a.className.replace(c,"$1");a.className=a.className.replace(/ $/,"")},e=function(){var b=window.location.pathname;if(b.indexOf("/")!=-1)b=b.split("/");var a=b[b.length-1]||"root";if(a.indexOf(".")!=-1)a=a.substring(0,a.indexOf("."));if(a>20)a=a.substring(a.length-19);return a},c="mi"+e(),b=function(b,a){this.g(b,a)};b.prototype={h:function(){var b=new RegExp(c+this.a+"=(\\d+)"),a=document.cookie.match(b);return a?a[1]:this.i()},i:function(){for(var b=0,c=this.b.length;b<c;b++)if(a(this.b[b].parentNode,"selected"))return b;return 0},j:function(b,d){var c=document.getElementById(b.TargetId);if(!c)return;this.l(c);for(var a=0;a<this.b.length;a++)if(this.b[a]==b){j(b.parentNode,"selected");d&&this.d&&this.k(this.a,a)}else h(this.b[a].parentNode,"selected")},k:function(a,b){document.cookie=c+a+"="+b+"; path=/"},l:function(b){for(var a=0;a<this.c.length;a++)this.c[a].style.display=this.c[a].id==b.id?"block":"none"},m:function(){this.c=[];for(var c=this,a=0;a<this.b.length;a++){var b=document.getElementById(this.b[a].TargetId);if(b){this.c.push(b);d(this.b[a],"click",function(b){var a=this;if(a===window)a=window.event.srcElement;c.j(a,1);g(b);return false})}}},g:function(f,h){this.a=h;this.b=[];for(var e=f.getElementsByTagName("a"),i=/#([^?]+)/,a,b,c=0;c<e.length;c++){b=e[c];a=b.getAttribute("href");if(a.indexOf("#")==-1)continue;else{var d=a.match(i);if(d){a=d[1];b.TargetId=a;this.b.push(b)}else continue}}var g=f.getAttribute("data-persist")||"";this.d=g.toLowerCase()=="true"?1:0;this.m();this.n()},n:function(){var a=this.d?parseInt(this.h()):this.i();if(a>=this.b.length)a=0;this.j(this.b[a],0)}};var k=[],i=function(e){var b=false;function a(){if(b)return;b=true;setTimeout(e,4)}if(document.addEventListener)document.addEventListener("DOMContentLoaded",a,false);else if(document.attachEvent){try{var f=window.frameElement!=null}catch(g){}if(document.documentElement.doScroll&&!f){function c(){if(b)return;try{document.documentElement.doScroll("left");a()}catch(d){setTimeout(c,10)}}c()}document.attachEvent("onreadystatechange",function(){document.readyState==="complete"&&a()})}d(window,"load",a)},f=function(){for(var d=document.getElementsByTagName("ul"),c=0,e=d.length;c<e;c++)a(d[c],"tabs")&&k.push(new b(d[c],c))};i(f);return{}})();
</script>

<style type="text/css">
.widefat td {
	vertical-align: middle;
	word-wrap: break-word;
}

.description {
	color: #898989;
	font-style: normal;
	font-weight: normal;
}

table tr:nth-child(3n+1) {
	background-color: #fcfcfc;
}

ul.tabs
{
	padding: 14px 0 2px;
	margin:0;
	font-size: 0;
	list-style-type: none;
	text-align: left; /*set to left, center, or right to align the tabs as desired*/
	background: #d6d6d6;
	border:1px solid #CCC;
	border-bottom:none;
	border-radius: 2px 2px 0 0;
}

ul.tabs li
{
	display: inline;
	margin: 0;
	margin-right: 2px; /*distance between tabs*/
	font: bold 12px Verdana;
}

ul.tabs li a
{
	text-decoration: none;
	position: relative;
	padding: 8px 22px;
	color: #919191;
	border-radius: 3px 3px 0 0;
	outline:none;
}

ul.tabs li a:hover
{
	text-decoration: none;
	color: #000;
}

ul.tabs li.selected a
{
	position: relative;
	top: 0px;
	font-weight:bold;
	background: #FFF;
	border: 1px solid #AAA;
	color: #000;
}


ul.tabs li.selected a:hover, ul.tabs li.selected a:hover
{
	text-decoration: none;
}

div.tabcontents
{
	border: 1px solid #CCC; padding: 30px;
	border-top-color:#AAA;
	background-color:#FFF;
	border-radius: 0 0 2px 2px;
}
</style>

<div class="wrap">
	<h1>Community Lite Plugin Settings</h1>
	<?php echo check_for_avchat_folder();?>
	<div><p>Disabled settings, along with many other options are available only in the <a href="http://avchat.net/integrations/community-pro-video-chat-plugin?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-disabled-settings&utm_campaign=avchat-wp-lite" target="_blank">Community PRO</a> version.</p></div>
	<ul class="tabs" data-persist="true">
		<li><a href="#view1">General Settings</a></li>
		<li><a href="#view2">Permissions and User Roles</a></li>
		<li><a href="#view3">Facebook & Twitter Login</a></li>
	</ul>
	<div class="tabcontents">
		<form name="form1" method="post" action="<?php echo $location;?>">

			<!-- SECTION: Plugin Settings -->
			<div id="view1">

				<table class="widefat">
					<thead>
					<tr>
						<th class="row-title" colspan="3">
							<h3>General settings</h3>
						</th>
						<?php foreach ($general_settings as $key => $value) {
								$av_general_settings = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "community_lite_general_settings");?>
					<tr>
						<td style="text-align:left" class="row-title">
							<?php echo $value;?> <br />

							<span class="description">
								<?php echo nl2br($general_settings_description[$key]);?>
							</span>
						</td>

						<td>
							<?php
							switch ($key) {

								case 'display_mode':?>
									<select name="avgsetting_<?php echo $key?>"  disabled="disabled">
										<option 	<?php if ($av_general_settings[0]->$key == 'popup') {echo 'selected="selected"';	}?> value="popup">Popup</option>
										<option 	<?php if ($av_general_settings[0]->$key == 'embed') {echo 'selected="selected"';	}?>value="embed">Embed</option>
									</select>
									<?php
									break;

								case ($key == 'allow_facebook_login' || $key == 'hide_left_side' || $key == 'p2t_default'):?>
									<select name="avgsetting_<?php echo $key?>"  disabled="disabled">
										<option value="yes">Yes</option>
										<option value="no" selected="selected">No</option>
									</select>
									<?php
									break;

								case 'flip_tab_menu':?>
									<select name="avgsetting_<?php echo $key?>"  disabled="disabled">
										<option 	<?php if ($av_general_settings[0]->$key == 'top') {echo 'selected="selected"';	}?> value="top">Top</option>
										<option 	<?php if ($av_general_settings[0]->$key == 'bottom') {echo 'selected="selected"';	}?>value="bottom">Bottom</option>
									</select>
									<?php
									break;

								case ($key == 'history_lenght'):?>
									<input style="text-align: center" size="3" type="text" name="avgsetting_<?php echo $key;?>" readonly="true" value="<?php echo $av_general_settings[0]->$key;?>" />
									<?php
									break;

								case ($key == 'text_char_limit'):?>
									<input style="text-align: center" size="3" type="text" name="avgsetting_<?php echo $key;?>" readonly="true" value="<?php echo $av_general_settings[0]->$key;?>" />
									<?php
									break;

								case ($key == 'invite_link'):?>
									<input type="text" name="avgsetting_<?php echo $key;?>" readonly="true" value="<?php echo $av_general_settings[0]->$key;?>" />
									<?php
									break;

								case ($key == 'disconnect_link'):?>
									<input type="text" name="avgsetting_<?php echo $key;?>" readonly="true" value="<?php echo $av_general_settings[0]->$key;?>" />
									<?php
									break;

								case 'preview_youtube_videos':?>
									<select disabled="disabled">
										<option value="top">Preview</option>
										<option value="bottom">No preview</option>
									</select>
									<?php
									break;

								case 'right_to_left':?>
									<select disabled="disabled">
										<option value="top">RTL support on</option>
										<option value="bottom">RTL support off</option>
									</select>
									<?php
									break;

								case 'show_avatars':?>
									<select disabled="disabled">
										<option value="top">Show avatars</option>
										<option value="bottom">Don't show avatars</option>
									</select>
									<?php
									break;

								case 'enable_webcam_docking':?>
									<select disabled="disabled">
										<option value="top">Enable webcam docking</option>
										<option value="bottom">Disable webcam docking</option>
									</select>
									<?php
									break;

								case 'display_username_realname':?>
									<select disabled="disabled">
										<option value="top">Usernames</option>
										<option value="bottom">Real names</option>
									</select>
									<?php
									break;

								case 'users_list_type':?>
									<select disabled="disabled">
										<option value="top">Small</option>
										<option value="bottom">Small with thumbnail</option>
										<option value="bottom">Big with thumbnail</option>
									</select>
									<?php
									break;

								case 'audio_video_quality':?>
									<select disabled="disabled">
										<option value="">96k - 64x48 pixels image size</option>
										<option value="">128k - Low quality</option>
										<option value="">256k - Medium quality</option>
										<option selected="selected" value="">256x192 @ 512Kb/s</option>
										<option value="">768k - HD</option>
									</select>
									<?php
									break;

								default:?>
									<input style="width: 100%" type="text" name="avgsetting_<?php echo $key;?>" value="<?php echo $av_general_settings[0]->$key;?>" />
								<?php }?>
						</td>
					</tr>
					<?php }?>
				</table><!-- End Plugin Settings -->

			</div><!-- END DIV SECTION -->

			<!-- SECTION: User Roles & Permissions -->
			<div id="view2">

				<p class="description">
					By default, there are 5 user roles in WordPress : Administrator, Editor, Author, Contributor and Subscriber. We also added a column for Visitors. Use the permissions table below to enable/disable certain features for certain user roles.
				</p>

					<table class="widefat">
						<thead>
							<tr>
								<th class="row-title">
									<h3>Permissions</h3>
								</th>
								<?php foreach ($user_roles as $role => $name) {?>
								<th class="row-title" style="text-align:center">
									<?php echo $name;?></th>
								<?php }?>
							</tr>
						</thead>

						<tr>

						<?php foreach ($permissions as $key => $value) {
							?>
						<tr>
							<td class="row-title" style="max-width: 150px; word-wrap: break-word;">
								<?php echo $value;?><br />

								<span class="description">
									<?php echo $permissions_description[$key];?>
								</span>
							</td>
							<?php
							foreach ($user_roles as $user_role => $name) {
									$user_permissions = $wpdb->get_results("SELECT can_access_chat, can_access_admin_chat, can_publish_audio_video, can_stream_private, can_send_files_to_rooms, can_send_files_to_users, can_pm, can_create_rooms, can_watch_other_people_streams, can_join_other_rooms, show_users_online_stay, view_who_is_watching_me, can_block_other_users, can_buzz, can_stop_viewer, can_ignore_pm, typing_enabled FROM " . $wpdb->prefix . "community_lite_permissions WHERE user_role = '" . $user_role . "'");
									?>
							<td style="text-align:center">
									<input type="checkbox"
									<?php
									if ($user_permissions[0]->$key) {echo 'checked="checked"';}
											if (
												$key == "can_stream_private" ||
												$key == "can_send_files_to_rooms" ||
												$key == "can_send_files_to_users" ||
												$key == "can_watch_other_people_streams" ||
												$key == "can_join_other_rooms" ||
												$key == "show_users_online_stay" ||
												$key == "view_who_is_watching_me" ||
												$key == "can_block_other_users" ||
												$key == "can_buzz" ||
												$key == "can_stop_viewer" ||
												$key == "can_ignore_pm" ||
												$key == "typing_enabled"

											) {echo 'disabled="disabled"';} ?>
																			   name="<?php echo strtolower($user_role);?>-avp_<?php echo $key;?>" />
									<?php
									if ($key == "can_stream_private" ||
												$key == "can_send_files_to_rooms" ||
												$key == "can_send_files_to_users" ||
												$key == "can_watch_other_people_streams" ||
												$key == "can_join_other_rooms" ||
												$key == "show_users_online_stay" ||
												$key == "view_who_is_watching_me" ||
												$key == "can_block_other_users" ||
												$key == "can_buzz" ||
												$key == "can_stop_viewer" ||
												$key == "can_ignore_pm" ||
												$key == "typing_enabled"
											) { ?>

									<input type="hidden" name="<?php echo strtolower($user_role);?>-avp_<?php echo $key;?>" value="<?php
									if ($user_permissions[0]->$key) {
													echo '1';} else {echo '0';}?>" />
								<?php } ?>
							</td>
							<?php } ?>
						</tr>
						<?php } ?>
					</table><!-- End checkboxes -->

				<br />



				<br />

				<!-- Start Chat settings -->
				<table class="widefat">
					<thead>
						<tr>
							<th class="row-title">
								<h3>Settings</h3>
							</th>
								<?php foreach ($user_roles as $role => $name) {?>
							<th class="row-title" style="text-align:center">
								<?php echo $name;?>
							</th>
								<?php }?>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($settings as $key => $value) {
							?>
						<tr>
							<td class="row-title" style="text-align:left; max-width: 150px; word-wrap: break-word;">
								<?php echo $value;?> <br />

								<span class="description">
									<?php echo $settings_description[$key];?>
								</span>
							</td>
							<?php
							foreach ($user_roles as $user_role => $name) {
									$user_settings = $wpdb->get_results("SELECT free_video_time, drop_in_room, max_streams, max_rooms, username_prefix FROM " . $wpdb->prefix . "community_lite_permissions WHERE user_role = '" . $user_role . "'");
									?>
							<td style="text-align:center">
									<input size="3" type="text"
										<?php
										if ($key == "free_video_time" ||
											$key == "drop_in_room" ||
											$key == "username_prefix") {echo 'readonly="true"';}
										?>
										name="<?php echo strtolower($user_role);?>-avs_<?php echo $key;?>" value="<?php echo $user_settings[0]->$key;?>" />
							</td>
							<?php }?>
						</tr>
						<?php }?>

						<tr>
						</tr>
					</tbody>
				</table><!-- End chat settings -->

			</div>
			<!-- END SECTION -->

			<!-- SECTION: Facebook & Twitter Login -->
			<div id="view3">

				<div>
					These settings are available only in the <a href="http://avchat.net/integrations/community-pro-video-chat-plugin?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-only-available-in-pro&utm_campaign=avchat-wp-lite" target="_blank">Community PRO</a> version.
				</div>

				<table class="widefat">
					<thead>
						<tr>
							<th class="row-title" colspan="2">
								<h3>Facebook setup</h3>
							</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="row-title"><label for="facebook">Facebook Application ID:</label></td>
							<td>
								<input type="text" id="facebook" class="regular-text" disabled="disabled" value="Disabled" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<ul>
									<li>1. Login in to your Facebook account</li>
									<li>2. <a href="https://developers.facebook.com/quickstarts/?platform=web" target="_blank">Register your website</a> as a new Facebook Application</li>
									<li>3. Your site URL should be: <code><?php echo get_site_url();?></code></li>
									<li>4. After registering, you will receive an Application ID</li>
									<li>5. Copy and paste into the form and Save Options</li>
									<li><em>Now your users will be able to login into your chat with their Facebook account.</em></li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>

				<br />

				<table class="widefat">
					<thead>
						<tr>
							<th class="row-title" colspan="2"><h3>Twitter setup</h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="row-title"><label for="twitter-key">Twitter Consumer Key:</label></td>
							<td>
								<input type="text" id="twitter-key" class="regular-text" disabled="disabled" value="Disabled" />
							</td>
						</tr>
						<tr>
							<td class="row-title"><label for="twitter-secret">Twitter Consumer Secret:</label></td>
							<td>
								<input type="text" id="twitter-secret" class="regular-text" disabled="disabled" value="Disabled" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<ul>
									<li>1. Login in to your Twitter account</li>
									<li>2. <a href="https://apps.twitter.com/app/new" target="_blank">Register your website</a> as a new Twitter Application</li>
									<li>3. Callback URL should be: <code><?php echo get_site_url();?></code></li>
									<li><em>You can use a custom post or page. Example: <?php echo get_site_url();?><strong>/chat</strong></em></li>
									<li>4. After registering, you will receive an API key</li>
									<li>5. Copy and paste into the form and Save Options</li>
									<li><em>Now your users will be able to login into your chat with their Twitter account.</em></li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- END SECTION view3 -->

			<p class="submit">
				<input type="submit" value="Save" class="button-primary" />
			</p>
		</form>
	</div> <!-- End tabcontents -->		
</div><!-- End wrap -->
