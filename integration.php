<?php 
/*
Copyright (C) 2009-2017, avchat.net

This WordPress Plugin is distributed under the terms of the GNU General Public License.
You can redistribute it and/or modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, either version 3 of the License, or any later version.

You should have received a copy of the GNU General Public License
along with this plugin.  If not, see <http://www.gnu.org/licenses/>.
 */

//start the session to have the $_SESSION array populated
if (session_id() == "") {session_start();}

//-----------------------------------------
//Config general settings
//-----------------------------------------
$avconfig['inviteLink'] = $_SESSION['invite_link'];

if ($_SESSION['disconnect_link'] != "") {
	$avconfig['disconnectButtonLink'] = $_SESSION['disconnect_link'];
}

if ($_SESSION['login_page_url'] != "" && $_SESSION['login_page_url'] != "/") {
	$avconfig['loginPageURL'] = $_SESSION['login_page_url'];
} else {
	$avconfig['loginPageURL'] = "../../../wp-login.php";
}

if ($_SESSION['register_page_url'] != "" && $_SESSION['login_page_url'] != "/") {
	$avconfig['registerPageURL'] = $_SESSION['register_page_url'];
} else {
	$avconfig['registerPageURL'] = "../../../wp-login.php?action=register";
}

$avconfig['textChatCharLimit'] = $_SESSION['text_char_limit'];

if ($_SESSION['history_lenght'] != "") {
	$avconfig['historyLength'] = $_SESSION['history_lenght'];
}

$avconfig['connectionstring'] = $_SESSION['connection_string'];

if ($_SESSION['flip_tab_menu'] == 'bottom') {
	$avconfig['flipTabMenu'] = 1;
} else {
	$avconfig['flipTabMenu'] = 0;
}

if ($_SESSION['hide_left_side'] == 'yes') {
	$avconfig['hideLeftSide'] = 1;
} else {
	$avconfig['hideLeftSide'] = 0;
}

if ($_SESSION['p2t_default'] == 'yes') {
	$avconfig['pushToTalkDefault'] = 1;
} else {
	$avconfig['pushToTalkDefault'] = 0;
}


//The Facebook APP ID and Twitter credentials are not exposed in the Community Lite's backend so these frontend functions (Facebook login, Post on facebook, invite Facebook friends, Twitter login) can not work
$avconfig['enableOtherAccountOptions'] = 0;
//Post on Twitter would work but the button is under the same setting as the Facebook invite friends and Facebook post buttons
$avconfig['enableFBandTwitterInvite'] = 0;


$role = $_SESSION['user_role'];

//if($role != "administrator"){
//----------------------------------------------------
//Config settings & permission for non administrators
//----------------------------------------------------
if ($_SESSION['can_access_chat'] == '0') {

	if ($role != "visitors") {
		$avconfig['showUserLevelError'] = 0;
		$avconfig['showLoginError'] = 1;

	} else {
		$avconfig['showLoginError'] = 1;
	}

} else {
	//-----------------------------------------
	//Config send audio/video permission
	//-----------------------------------------
	if ($_SESSION['can_publish_audio_video']) {
		$avconfig['allowVideoStreaming'] = 1;
		$avconfig['allowAudioStreaming'] = 1;

		//-----------------------------------------
		//Config private stream permission
		//-----------------------------------------
		if ($_SESSION['can_stream_private']) {
			$avconfig['allowPrivateStreaming'] = 1;
		} else {
			$avconfig['allowPrivateStreaming'] = 0;
		}
	} else {
		$avconfig['allowVideoStreaming'] = 0;
		$avconfig['allowAudioStreaming'] = 0;
	}

	//-----------------------------------------
	//Config send file to room/user permissions
	//-----------------------------------------
	if ($_SESSION['can_send_files_to_rooms']) {
		$avconfig['sendFileToRoomsEnabled'] = 1;
	} else {
		$avconfig['sendFileToRoomsEnabled'] = 0;
	}

	if ($_SESSION['can_send_files_to_users']) {
		$avconfig['sendFileToUserEnabled'] = 1;
	} else {
		$avconfig['sendFileToUserEnabled'] = 0;
	}

	//-----------------------------------------
	//Config send private message permission
	//-----------------------------------------
	if ($_SESSION['can_pm']) {
		$avconfig['pmEnabled'] = 1;
	} else {
		$avconfig['pmEnabled'] = 0;
	}

	//-----------------------------------------
	//Config room creation permission
	//-----------------------------------------
	if ($_SESSION['can_create_rooms']) {
		$avconfig['createRoomsEnabled'] = 1;
	} else {
		$avconfig['createRoomsEnabled'] = 0;
	}

	//-----------------------------------------
	//Config can watch other people streams
	//-----------------------------------------
	if ($_SESSION['can_watch_other_people_streams']) {
		$avconfig['maxStreams'] = $_SESSION['max_streams'];
	} else {
		$avconfig['maxStreams'] = 0;
	}

	//-----------------------------------------
	//Config joining other rooms
	//-----------------------------------------
	if ($_SESSION['can_join_other_rooms']) {
		$avconfig['joinRoomsEnabled'] = 1;
	} else {
		$avconfig['joinRoomsEnabled'] = 0;
	}

	//-----------------------------------------
	//Config showing online stay in top left corner
	//-----------------------------------------
	if ($_SESSION['show_users_online_stay']) {
		$avconfig['showOnlineTime'] = 1;
	} else {
		$avconfig['showOnlineTime'] = 0;
	}

	//-----------------------------------------
	//Config if users can see who is watching them
	//-----------------------------------------
	if ($_SESSION['view_who_is_watching_me']) {
		$avconfig['userCanSeeWhoIsWatchingHim'] = 1;
	} else {
		$avconfig['userCanSeeWhoIsWatchingHim'] = 0;
	}

	//-----------------------------------------
	//Config if users can block other users
	//-----------------------------------------
	if ($_SESSION['can_block_other_users']) {
		$avconfig['userCanBlockOtherUsers'] = 1;
	} else {
		$avconfig['userCanBlockOtherUsers'] = 0;
	}

	//-----------------------------------------
	//Config if users can buzz other users
	//-----------------------------------------
	if ($_SESSION['can_buzz']) {
		$avconfig['buzzButtonEnabled'] = 1;
	} else {
		$avconfig['buzzButtonEnabled'] = 0;
	}

	//-----------------------------------------
	//Config if users can stop other users from viewing him
	//-----------------------------------------
	if ($_SESSION['can_stop_viewer']) {
		$avconfig['stopViewerButtonEnabled'] = 1;
	} else {
		$avconfig['stopViewerButtonEnabled'] = 0;
	}

	//-----------------------------------------
	//Config if users can ignore PM
	//-----------------------------------------
	if ($_SESSION['can_ignore_pm']) {
		$avconfig['showIgnorePMsButton'] = 1;
	} else {
		$avconfig['showIgnorePMsButton'] = 0;
	}

	//-----------------------------------------
	//Config if users can type
	//-----------------------------------------
	if ($_SESSION['typing_enabled']) {
		$avconfig['typingEnabled'] = 1;
	} else {
		$avconfig['typingEnabled'] = 0;
	}

	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	//                    SETTINGS
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	//-----------------------------------------
	//Config free video time
	//-----------------------------------------
	if ($_SESSION['free_video_time'] != "") {
		$avconfig['freeVideoTime'] = $_SESSION['free_video_time'];
	}

	//-----------------------------------------
	//Config drop in room
	//-----------------------------------------
	if ($_SESSION['drop_in_room'] != "") {
		$avconfig['dropInRoom'] = $_SESSION['drop_in_room'];
	}

	//-----------------------------------------
	//Config max streams a user can watch
	//-----------------------------------------
	if ($_SESSION['max_streams'] != "") {
		$avconfig['maxStreams'] = $_SESSION['max_streams'];
	}

	//-----------------------------------------
	//Config max rooms one can be in
	//-----------------------------------------
	if ($_SESSION['max_rooms'] != "") {
		$avconfig["maxRoomsOneCanBeIn"] = $_SESSION['max_rooms'];
	}

	//-----------------------------------------
	//Config what prefix should the usernames have
	//-----------------------------------------
	if ($_SESSION['username_prefix'] != "") {
		$avconfig["userNamePrefix"] = $_SESSION['username_prefix'];
	}

}
//}else{
//------------------------------------------
//Give maximum permissions to administrators
//------------------------------------------

//$avconfig['freeVideoTime'] = -1;
//$avconfig['maxStreams']=99;
//$avconfig["maxRoomsOneCanBeIn"]=99;
//}

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) {
	//-----------------------------------------
	//Config username
	//-----------------------------------------
	$avconfig['username'] = $_SESSION['user_login'];
	$avconfig['changeuser'] = 0;
	//-----------------------------------------
	//Get user role
	//-----------------------------------------
	$role = $_SESSION['user_role'];

	if (isset($_SESSION['is_buddy']) && $_SESSION['is_buddy']) {

		//USER AVATAR
		$avconfig['usersListType'] = 'thumbnail';
		$avconfig['thumbnailUrl'] = $_SESSION['avatar'];

		//User profile page
		$avconfig['profileKey'] = 'username';
		$avconfig['profileUrl'] = '../../../members/';
	}

	//----------------------------------------------------
	//Deny access to chat admin to unauthorized users
	//----------------------------------------------------
	if (isset($_GET['admin']) && $_GET['admin'] == 'true') {
		//if admin.swf made the request check to see if the user is allowed to access the admin area
		if (!$_SESSION['can_access_admin_chat']) {
			if ($role != "visitors") {
				$avconfig['showUserLevelError'] = 1;
			} else {
				$avconfig['showLoginError'] = 1;
			}
			return 0;

		}
	}

} else {
	//--------------------------------------------------------------------
	//Generate predefined usernames for visitors, set $avconfig['changeuser']=1; to allow them to change their username
	//--------------------------------------------------------------------
	$avconfig['username'] = 'visitor_' . rand(0, 999);
	$avconfig['changeuser'] = 0;

	//----------------------------------------------------
	//Security feature: deny access to the chat admin aera (admin.swf) to visitors
	//----------------------------------------------------
	/*
	if(isset($_GET['admin']) && $_GET['admin'] == 'true'){
		if($role != "visitors"){
		$avconfig['showUserLevelError'] = 1;
	} else {
		$avconfig['showLoginError'] = 1;
	}
	*/
}

?>