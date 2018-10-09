<?php
/*
Plugin Name: Prueba Plugin
Plugin URI:  https://github.com/simonrcodrington/Introduction-to-WordPress-Plugins---Location-Plugin
Description: Prueba plugin para ver las cajas
Version:     1.0.0
Author:      Simon Codrington
Author URI:  http://www.simoncodrington.com.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

class Prueba{
    public function __construct(){
        add_action('init', array($this,'register_prueba_content_type')); //register prueba content type
        add_action('add_meta_boxes', array($this,'add_prueba_meta_boxes')); //add meta boxes

        register_activation_hook(__FILE__, array($this,'plugin_activate'));     // activate hook y llamamos a register_post_type
		register_deactivation_hook(__FILE__, array($this,'plugin_deactivate')); // deactivate hook
    }
    
    public function plugin_activate(){
        // call our custom content type function
	 	$this->register_prueba_content_type();
        // flush permalinks
        flush_rewrite_rules();
    }

    public function_deactivate(){
        // flush permalinks
		flush_rewrite_rules();
    }

    public function register_prueba_content_type(){
        //Labels for post type
		 $labels = array(
            'name'               => 'Prueba',
            'singular_name'      => 'Prueba', // name of object
            'menu_name'          => 'Pruebas',
            'name_admin_bar'     => 'Prueba',
            'add_new'            => 'Add New', 
            'add_new_item'       => 'Add New Prueba',
            'new_item'           => 'New Prueba', 
            'edit_item'          => 'Edit Prueba',
            'view_item'          => 'View Prueba',
            'all_items'          => 'All Pruebas',
            'search_items'       => 'Search Pruebas',
            'parent_item_colon'  => 'Parent Prueba:', 
            'not_found'          => 'No Pruebas found.', 
            'not_found_in_trash' => 'No Pruebas found in Trash.',
        );
        //arguments for post type
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'publicly_queryable'=> true,
            'show_ui'           => true,
            'show_in_nav'       => true,
            'query_var'         => true,
            'hierarchical'      => false,
            'supports'          => array('title','thumbnail','editor'),
            'has_archive'       => true,
            'menu_position'     => 20,
            'show_in_admin_bar' => true,
            'menu_icon'         => 'dashicons-location-alt',
            'rewrite'			=> array('slug' => 'locations', 'with_front' => 'true')
        );
        //register post type
        register_post_type('wp_prueba', $args);
        
        /*
		 *'title'
		 *'editor' (content)
		 *'author'
		 *'thumbnail' (featured image, current theme must also support post-thumbnails)
		 *'excerpt'
		 *'trackbacks'
		 *'custom-fields'
		 *'comments' (also will see comment count balloon on edit screen)
		 *'revisions' (will store revisions)
		 *'page-attributes' (menu order, hierarchical must be true to show Parent option)
		 *'post-formats' add post formats, see Post Formats
		 */
    }

    public function add_prueba_meta_boxes(){
        add_meta_box(
			'prueba', 				  // id
			'Prueba Information', 				  // name
			array($this,'prueba_meta_box_display'), // display function
			'wp_prueba', 						  // post type
			'normal', 								  // location
			'default' 								  // priority
		);
    }

    // Le pasamos el custom post type
    public function prueba_meta_box_display($post){
        //set nonce field
		wp_nonce_field('wp_prueba_nonce', 'wp_prueba_nonce_field');
		//collect variables
		$wp_prueba_phone 	 = get_post_meta($post->ID,'wp_prueba_phone',true);
		$wp_prueba_email 	 = get_post_meta($post->ID,'wp_prueba_email',true);
		$wp_prueba_address   = get_post_meta($post->ID,'wp_prueba_address',true);
		?>
		<p>Agrega la información que corresponda para la dirección: </p>
		<div class="field-container">
			<?php 
			//before main form elementst hook
			do_action('wp_prueba_admin_form_start'); 
			?>
			<div class="field">
				<label for="wp_prueba_phone">Contact Phone</label>
				<small>main contact number</small>
				<input type="tel" name="wp_prueba_phone" id="wp_prueba_phone" value="<?php echo $wp_prueba_phone;?>"/>
			</div>
			<div class="field">
				<label for="wp_prueba_email">Contact Email</label>
				<small>Email contact</small>
				<input type="email" name="wp_location_email" id="wp_location_email" value="<?php echo $wp_location_email;?>"/>
			</div>
			<div class="field">
				<label for="wp_prueba_address">Address</label>
				<small>Physical address of your location</small>
				<textarea name="wp_location_address" id="wp_location_address"><?php echo $wp_location_address;?></textarea>
			</div>
			<?php
			//trading hours
			if(!empty($this->wp_location_trading_hour_days)){
				echo '<div class="field">';
					echo '<label>Trading Hours </label>';
					echo '<small> Trading hours for the location (e.g 9am - 5pm) </small>';
					//go through all of our registered trading hour days
					foreach($this->wp_location_trading_hour_days as $day_key => $day_value){
						//collect trading hour meta data
						$wp_location_trading_hour_value =  get_post_meta($post->ID,'wp_location_trading_hours_' . $day_key, true);
						//dsiplay label and input
						echo '<label for="wp_location_trading_hours_' . $day_key . '">' . $day_key . '</label>';
						echo '<input type="text" name="wp_location_trading_hours_' . $day_key . '" id="wp_location_trading_hours_' . $day_key . '" value="' . $wp_location_trading_hour_value . '"/>';
					}
				echo '</div>';
			}		
			?>
		<?php 
		//after main form elementst hook
		do_action('wp_location_admin_form_end'); 
		?>
		</div>
		<?php       
    }

}
?>