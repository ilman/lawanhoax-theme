<?php 

function lawanhoax_cpt_report() {
	register_post_type('lawanhoax_cpt_report',
		array(
			'labels' => array(
				'name' => __('Report', SG_THEME_ID),
				'singular_name' => __('Report', SG_THEME_ID)
			),
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			'rewrite' => array(
				'slug' => 'staff'
			),
		)
	);
}
add_action('init', 'lawanhoax_cpt_report');




/*----rename featured image metabox----*/

function lawanhoax_cpt_report_change_image_box()
{
    remove_meta_box( 'postimagediv', 'custom_post_type', 'side' );
    add_meta_box('postimagediv', __('New Text'), 'post_thumbnail_meta_box', 'custom_post_type', 'normal', 'high');
}
//add_action('do_meta_boxes', 'lawanhoax_cpt_report_change_image_box');




/*----metabox for custom post type----*/

function lawanhoax_metabox(){

	$prefix = '_lawanhoax_post_'; //always use prefix _ for metabox

	/*----options----*/

	

	/*----fields----*/

	$fields = array(
		
		array(
			'label'		=> 'Title / Position',
			'id'		=> $prefix.'title',
			'default'	=> '',
			'type'		=> 'text'
		),
		array(
			'label'		=> 'Linkedin Url',
			'id'		=> $prefix.'linkedin_url',
			'default'	=> '',
			'type'		=> 'text'
		),
		array(
			'label'		=> 'All Agent Url',
			'id'		=> $prefix.'all_agent_url',
			'default'	=> '',
			'type'		=> 'text'
		),
		array(
			'label'		=> 'Quote',
			'id'		=> $prefix.'quote',
			'default'	=> '',
			'type'		=> 'textarea',
			'sanitizer'	=> 'none',
			'attr'		=> array(
				'rows'		=> 8
			)
		)
		
	);

	return $fields;
}

$lawanhoax_metabox = new sg_metabox(array(
	'id'		=> 'lawanhoax_metabox', 
	'title'		=> 'Klarifikasi', 
	'fields'	=> 'lawanhoax_metabox', 
	'post_type'	=> 'lawanhoax_cpt_report',
	'context'	=> 'normal',
	'priority'	=> 'high'
));

/*----filters----*/

// function lawanhoax_cpt_report_template( $template_path ) {
//     // http://code.tutsplus.com/tutorials/a-guide-to-wordpress-custom-post-types-creation-display-and-meta-boxes--wp-27645
//     if(get_post_type() == 'lawanhoax_cpt_report') {
//         if( is_single() ) {
//             $file = '/templates/sg-cpt-staff.php';
//             if($theme_file = locate_template($file)){
//                 $template_path = $theme_file;
//             } 
// 	        else {
// 	            $template_path = plugin_dir_path( __FILE__ ) . $file;
// 	        }
//         }
//     }
//     return $template_path;
// }
// add_filter( 'template_include', 'lawanhoax_cpt_report_template', 1 );


/*----taxonomies----*/

function lawanhoax_cpt_report_taxonomies() {
    register_taxonomy(
        'label',
        array('lawanhoax_cpt_report', 'post'),
        array(
            'labels' => array(
                'name' => 'Label',
                'add_new_item' => 'Add New Label',
                'new_item_name' => "New Label"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_admin_column' => true,
	        // 'query_var' => true,
	        // 'rewrite' => array( 'slug' => 'fitness-type' ),
        )
    );

    register_taxonomy(
        'figure',
        array('lawanhoax_cpt_report', 'post'),
        array(
            'labels' => array(
                'name' => 'Figure',
                'add_new_item' => 'Add Figure'
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => false,
            // 'show_admin_column' => true,
	        // 'query_var' => true,
	        // 'rewrite' => array( 'slug' => 'fitness-type' ),
        )
    );
}
add_action( 'init', 'lawanhoax_cpt_report_taxonomies', 0 );

/*----change column in post list----*/

function lawanhoax_cpt_report_change_columns($cols) {
	$cols = array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Name'),
		'sg_col_image' => __('Image'),
		'sg_col_title' => __('Title'),
		'taxonomy-post-label' => __('Label'),
		'date' => __('Date'),
	);
		
	return $cols;
}
add_filter('manage_lawanhoax_cpt_report_posts_columns', 'lawanhoax_cpt_report_change_columns');

function lawanhoax_cpt_report_custom_columns($column, $post_id){
	switch($column){
		case "sg_col_image":
			if(has_post_thumbnail()){
				echo 'yes';
			}
			else{
				echo 'no';
			}
		break;	
		case "sg_col_title":
			$dep = get_post_meta($post_id, '_sg_mb_staff_title', true);
			echo $dep;
		break;
	}
}
add_action('manage_lawanhoax_cpt_report_posts_custom_column', 'lawanhoax_cpt_report_custom_columns', 10, 2 );

function lawanhoax_cpt_report_taxonomies_columns( $taxonomies ) {
    $taxonomies[] = 'lawanhoax_cpt_report_group';
    return $taxonomies;
}
add_filter('manage_taxonomies_for_lawanhoax_cpt_report_columns', 'lawanhoax_cpt_report_taxonomies_columns');