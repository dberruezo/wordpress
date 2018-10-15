<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Html for newsletter form
 *
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */
class Wpens_Shortcodes {
	
	public function __construct(){
		
		// Shortcode to print newletter form 
		// Shortcode : [wpens_easy_newsletter lastname="yes" firstname="yes" button_text="Send"]
		add_shortcode( 'wpens_easy_newsletter', array($this, 'wpens_newsletter_form_shortcode') );

		//Use shortcode in widget
		add_filter('widget_text','do_shortcode');

	}
	
	/**
	 * Adding Html
	 *
	 * Adding html for front end side.
	 *
	 * @package Easy Newsletter Signups
	 * @since 1.0.0
	 */
	function wpens_newsletter_form_shortcode( $atts, $content ) {
		
		// Getting attributes of shortcode
		extract( shortcode_atts( array(
			'button_text'	=> __( 'Submit', 'wpens' ),
			'firstname'	=> 'yes',
			'lastname'	=> 'yes',
		), $atts ) );
		
		ob_start(); ?>

		<div class="easy-newsletter">
			<form  id="easy-newsletter-form" >
				<?php
				if( $firstname == 'yes' ) { ?>
					<div class="input-field">
						<label><?php echo __( 'First Name', 'wpens' ); ?></label>
						<input type="text" name="first_name" class="wpens_firstname" />
					</div>
				<?php } ?>

				<?php
				if( $lastname == 'yes' ) { ?>
					<div class="input-field">
						<label><?php echo __( 'Last Name', 'wpens' ) ?></label>
						<input type="text" name="last_name" class="wpens_lastname">
					</div>
				<?php } ?>
				<div class="clearfix">
				<div class="row">
				<div class="col-xs-10 input-field">
					<input type="text" name="email" placeholder="Email" class="wpens_email">
				</div>

				<div class="col-xs-2 input-field input-submit">
					<button style="width: 100%; background: none; color: red; font-size: 30px; line-height: 60px; text-align: center; padding: 0; display: block;" type="button" id="easy-newsletter-submit" > > </button>
					
					<div class="wpens_ajax_loader" style="display: none;"><img src="<?php echo WPENS_PLUGIN_URL; ?>/images/ajax_loader.gif"></div>
				</div>
				</div>
				</div>
				<div class="checkbox" style="font-size: 14px;">
				<input type="checkbox" name="nwscheck" id="nwscheck" class="nwscheck" value="1">
				<label for="nwscheck"> 
				He leído y acepto la <a href="<?php echo get_site_url();?>/aviso-legal/" target="_blank">política de privacidad</a>
				</label>
				</div>
				<div class="wpens-message-container"></div>
			</form>
		</div>

		<?php
		$content .= ob_get_clean();
		return $content;
	}
}

return new Wpens_Shortcodes();
