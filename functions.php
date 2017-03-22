<?php

function custom_function() {
	//code
}

add_action( 'action', 'custom_function');

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

$header_info = array(
    'width'         => 980,
    'height'        => 200,
    'flex-width'    => true,
    'flex-height'   => true,
    'default-image' => get_template_directory_uri() . '/img/home-bg.jpg',
);

$header_images = array(
    'desk' => array(
            'url'           => get_template_directory_uri() . '/img/home-bg.jpg',
            'description'   => 'Desk MacBook',
    )
);

add_theme_support( 'custom-header', $header_info );
register_default_headers( $header_images );

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );      
           submit_button(); 
       ?>          
    </form>
  </div>
<?php }


// Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function setting_facebook() { ?>
  <input type="text" name="facebook" id="facebook" value="<?php echo get_option( 'facebook' ); ?>" />
<?php }

function setting_logotext() { ?>
  <input type="text" name="logotext" id="logotext" value="<?php echo get_option( 'logotext' ); ?>" />
<?php }

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
  add_settings_field( 'logotype', 'Logotext', 'setting_logotext', 'theme-options', 'section' );

  register_setting('section', 'twitter');
  register_setting('section', 'facebook');
  register_setting('section', 'logotext');
}
add_action( 'admin_init', 'custom_settings_page_setup' );