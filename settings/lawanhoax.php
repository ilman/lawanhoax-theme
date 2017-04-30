<?php 

add_filter('upload_mimes','restrict_mime');
function restrict_mime($mimes) {
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif' => 'image/gif',
		'png' => 'image/png',
		'bmp' => 'image/bmp',
	);
	return $mimes;
}

function my_after_login_redirect( $redirect_to, $request, $user ) {
	// is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			if(stripos($redirect_to, '/wp-admin') === false){
				return $redirect_to;
			}
			else{
				$user_report_list_page = sg_opt('user_report_list_page');
				return get_permalink($user_report_list_page);
			}
		}
	} 
	else {
		$user_report_list_page = sg_opt('user_report_list_page');
		return get_permalink($user_report_list_page);
	}

	// return 'http://localhost/project-wp/lawanhoax/sample-page/';
}

add_filter( 'login_redirect', 'my_after_login_redirect', 10, 3 );



function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');