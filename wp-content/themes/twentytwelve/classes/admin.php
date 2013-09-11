<?php 
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/images/Logo.png') no-repeat scroll center top gray;
		height: 115px;
		width: 329px;
	}
	body.login{background-color:gray;}
	</style>
	";
}

add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
?>
<script>	
	jQuery(document).ready(	function()
			{
			jQuery("#adminmenushadow").before('<div style="margin-bottom:-4px" id="sidebar_adminmenu_logo" onclick="window.open(&quot;http://wmg.co.il&quot;);" title="http://wmg.co.il"><img width="145" src="http://ipatent.co.il/wp-content/themes/twentytwelve/images/Logo.png"></div>');
			}
    );
	</script>

	
<?php 
}

add_action( 'admin_head', 'wmg_adminroles');
function wmg_adminroles(){

	global $wp_roles;
	
	foreach ( $wp_roles->role_names as $role => $name ) :
	
	if ( current_user_can( $role ) )
		 $user_role=$role;
	endforeach;
	
	 
	
if($user_role=='editor')
	{
	?>
	<style>
		#wp-admin-bar-wp-logo{ display: none; visibility: hidden; }
		.update-nag{  visibility: hidden; }
		#dashboard_primary,#dashboard_secondary,.versions{visibility: hidden;}
		#profile-page table.form-table tr{display:none;}
		#profile-page table.form-table tr#password{display:block;}
		
		#nav-menu-theme-locations, #trackbacksdiv, #postcustom, #commentstatusdiv, #commentsdiv, 
		#formatdiv, #slugdiv, #profile-page h3, #profile-page .editform, #wpfooter, #postexcerpt p {display:none;}
		
	</style>
	<script>

	
		
		
	</script>
	<?php	
		$roles = get_role( 'editor' );
		$remove_caps = array(
				'manage_links',
				'edit_others_posts',
				'edit_others_pages',
				'delete_posts',
				'comment_moderation'
		);
		$add_caps= array(
				'manage_categories',
				'edit_pages',
				'edit_posts',
				'edit_others_posts',
				'edit_others_pages',
				'gform_full_access',
				'edit_theme_options',
				'edit_media'
		);

		
		remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
		remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
		remove_submenu_page( 'themes.php', 'custom-header' );// hide the header submenu
		remove_submenu_page( 'themes.php', 'custom-background' ); //hide the backgrond submenu
		
		
		 remove_submenu_page( 'gf_edit_forms', 'gf_edit_forms' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_new_form' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_help' );
		// remove_submenu_page( 'gf_edit_forms', 'gf_entries' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_settings' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_export' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_update' );
		 remove_submenu_page( 'gf_edit_forms', 'gf_addons' );
		 
		 remove_menu_page('tools.php');
		 remove_menu_page('edit-comments.php');
		
	}
	

	foreach ( $remove_caps as $cap ){
		// remove $cap capability for this role object
		$roles->remove_cap( $cap );
	}
	
	foreach ( $add_caps as $cap ){
		// remove $cap capability for this role object
		$roles->add_cap( $cap );
	}
	

 }
?>