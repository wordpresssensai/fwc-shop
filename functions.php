<?php

add_action( 'after_setup_theme', 'fwc_foundation_wooocommerce_gutenberg_setup' );

if ( ! function_exists ( 'fwc_foundation_wooocommerce_gutenberg_setup' ) ) {

    function fwc_foundation_wooocommerce_gutenberg_setup () {

        add_theme_support( 'automatic-feed-links' );

        load_theme_textdomain( 'fwc-shop' );

        add_theme_support( 'title-tag' );

        register_nav_menu ( 'primary', __( 'Primary', 'fwc-shop' ) );

    }

}

add_action( 'wp_enqueue_scripts', 'fwc_foundation_gutenberg_styles' );

if ( ! function_exists ( 'fwc_foundation_gutenberg_styles' ) ) {

    function fwc_foundation_gutenberg_styles () {

        wp_enqueue_style ( 'fwc-woocommerce-foundation', get_template_directory_uri () . '/assets/css/foundation.min.css', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-icons', get_template_directory_uri () . '/assets/css/foundation-icons.css', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-eot', get_template_directory_uri () . '/assets/css/foundation-icons.eot', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-ttf', get_template_directory_uri () . '/assets/css/foundation-icons.ttf', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-woff', get_template_directory_uri () . '/assets/css/foundation-icons.woff', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-app-css', get_template_directory_uri () . '/assets/css/app.css', array(), '5.0.0' );
    
        wp_enqueue_script ( 'fwc-woocommerce-jquery', get_template_directory_uri () . '/assets/js/vendor/jquery.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-what-input', get_template_directory_uri () . '/assets/js/vendor/what-input.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-foundation-js', get_template_directory_uri () . '/assets/js/vendor/foundation.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-app-js', get_template_directory_uri () . '/assets/js/app.js', array(), '5.0.0', true );

    }

}

add_action ( 'admin_enqueue_scripts', 'fwc_woocommerce_scripts' );

if ( ! function_exists ( 'fwc_woocommerce_scripts' ) ) {

    function fwc_woocommerce_scripts ( $hook ) {

        if ( $hook != 'toplevel_page_custompage' ) {

            return;

        }

        wp_enqueue_media();

        wp_enqueue_style ( 'fwc-woocommerce-foundation', get_template_directory_uri () . '/assets/css/foundation.min.css', array(), '5.0.0' );

        wp_enqueue_style ( 'fwc-woocommerce-app-admin', get_template_directory_uri () . '/assets/css/app-admin.css', array(), '5.0.0' );

        wp_enqueue_script ( 'fwc-woocommerce-jquery', get_template_directory_uri () . '/assets/js/vendor/jquery.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-what-input', get_template_directory_uri () . '/assets/js/vendor/what-input.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-foundation-js', get_template_directory_uri () . '/assets/js/vendor/foundation.min.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'fwc-woocommerce-app-admin', get_template_directory_uri () . '/assets/js/app-admin.js', array(), '5.0.0', true );

    }

}

require get_template_directory() . '/inc/block-patterns.php';

if ( ! function_exists( 'fwc_shop_block_styles' ) ) {

	function fwc_shop_block_styles() {

		register_block_style(

			'woocommerce/product-title',

			array(

				'name'         => 'product-title',

				'label'        => __( 'Product Title', 'fwc-shop' ),

                'inline_style' => 'h3.wp-block-post-title a { color: red !important; }',

			)

		);

	}
    
 }

add_action( 'init', 'fwc_shop_block_styles' );

if ( ! function_exists ( 'fwc_createMmenu' ) ) {

    function fwc_createMmenu ( $menu ) {

        $html = '';

        foreach ( $menu as $key => $value ) {

            $html .= '<li>';

            $html .= '<a href="' . $value['url'] . '">' . $key . '</a>';

            if ( ! empty ( $value['children'] ) ) {

                $html .= '<ul class="menu">';

                $html .= fwc_createMmenu ( $value['children'] );

                $html .= '</ul>';

            }

            $html .= '</li>';

        }

        return $html;

    }

}

add_action( 'wp_ajax_hubspot_lists', 'fwc_ajax_hubspot_lists_handler' );

if ( !function_exists ( 'fwc_ajax_hubspot_lists_handler' ) ) {

    function fwc_ajax_hubspot_lists_handler () {
        
        update_option ( 'hubspot_list_id', $_POST['hubspot_list_id'] );

        echo 'Hubspot list ID ' . $_POST['hubspot_list_id'] . ' has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_hubspot_access_token', 'fwc_ajax_hubspot_access_token_handler' );

if ( !function_exists ( 'fwc_ajax_hubspot_access_token_handler' ) ) {

    function fwc_ajax_hubspot_access_token_handler () {
        
        update_option ( 'hubspot_access_token', $_POST['hubspot_access_token'] );

        echo 'Hubspot access token has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_instagram_url', 'fwc_ajax_instagram_url_handler' );

if ( !function_exists ( 'fwc_ajax_instagram_url_handler' ) ) {

    function fwc_ajax_instagram_url_handler () {
        
        update_option ( 'instagram_url', $_POST['instagram_url'] );

        echo 'Instagram URL has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_twitter_url', 'fwc_ajax_twitter_url_handler' );

if ( !function_exists ( 'fwc_ajax_twitter_url_handler' ) ) {

    function fwc_ajax_twitter_url_handler () {
        
        update_option ( 'twitter_url', $_POST['twitter_url'] );

        echo 'Twitter URL has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_youtube_url', 'fwc_ajax_youtube_url_handler' );

if ( !function_exists ( 'fwc_ajax_youtube_url_handler' ) ) {

    function fwc_ajax_youtube_url_handler () {
        
        update_option ( 'youtube_url', $_POST['youtube_url'] );

        echo 'Youtube URL has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_left_footer', 'fwc_ajax_left_footer_handler' );

if ( !function_exists ( 'fwc_ajax_left_footer_handler' ) ) {

    function fwc_ajax_left_footer_handler () {
        
        update_option ( 'left_footer', $_POST['left_footer'] );

        echo 'Left footer has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_logo_url', 'fwc_ajax_logo_url_handler' );

if ( !function_exists ( 'fwc_ajax_logo_url_handler' ) ) {

    function fwc_ajax_logo_url_handler () {
        
        update_option ( 'logo_url', $_POST['logo_url'] );

        echo 'Logo URL has been updated successfully';

        wp_die();
    }

}

add_action( 'wp_ajax_logo_dimensions', 'fwc_ajax_logo_dimensions_handler' );

if ( !function_exists ( 'fwc_ajax_logo_dimensions_handler' ) ) {

    function fwc_ajax_logo_dimensions_handler () {
        
        update_option ( 'logo_width', $_POST['logo_width'] );

        update_option ( 'logo_height', $_POST['logo_height'] );

        echo 'Logo width and height have been updated successfully';

        wp_die();
    }

}


if ( ! function_exists ( 'fwc_menu' ) ) {

    function fwc_menu () {

    	add_menu_page (

    		__( 'FWC Shop', 'fwc-shop' ),

    		'FWC Shop',

    		'manage_options',

    		'custompage',

            'fwc_menu_page',

            get_template_directory_uri () . '/assets/images/fwct_icon.png'

    	);

    }

}

add_action ( 'admin_menu', 'fwc_menu' );

if ( ! function_exists ( 'fwc_menu_page' ) ) {

    function fwc_menu_page () {

    	$accordion = '

            <div class="grid-container fluid">

                <ul class="accordion" data-responsive-accordion-tabs="accordion medium-tabs large-accordion">
                
                    <li class="accordion-item is-active" data-accordion-item>
                
                        <a href="#" class="accordion-title">Header Settings</a>

                        <div class="accordion-content" data-tab-content>

                            <div id="logo-url-message"></div>

                            <label>Logo Url</label>
                                <input 
                                
                                    id="img-upload-url" 
                                    
                                    type="text" name="logo-url" 
                                    
                                    placeholder="Logo URL" 

                                    value="' . wp_unslash ( get_option ( 'logo_url' ) ) . '"
                                
                                />

                            <a id="img-upload" class="button primary" href="javascript:void(0);">Upload</a>

                            <button id="save-logo-url" class="submit success button">Save</button>

                            <br/><br/>

                                    <div id="logo-dimensions-message"></div>

                                    <div>Default is 50h x 50w px</div>

                                    <div class="grid-x grid-margin-x">

                                        <div class="cell small-10">

                                            <label>Log Height</label>

                                            <div class="slider" data-slider data-initial-start="' . wp_unslash ( get_option ( 'logo_height' ) ) . '">

                                                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="logo-height"></span>
                                                
                                                <span class="slider-fill" data-slider-fill></span>
                                            
                                            </div>
                                        
                                        </div>

                                        <div class="cell small-2">

                                            <input type="number" id="logo-height">

                                        </div>

                                    </div>

                                    <br/><br/>

                                    <div class="grid-x grid-margin-x">

                                        <div class="cell small-10">

                                            <label>Log Width</label>

                                            <div class="slider" data-slider data-initial-start="' . wp_unslash ( get_option ( 'logo_width' ) ) . '" data-end="200">

                                                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="logo-width"></span>
                                                
                                                <span class="slider-fill" data-slider-fill></span>
                                            
                                            </div>
                                        
                                        </div>

                                        <div class="cell small-2">

                                            <input type="number" id="logo-width">

                                        </div>

                                    </div>

                                    <button id="save-logo-dimensions" class="submit success button">Save</button>
                            
                
                        </div>
                
                    </li>
            
                    <li class="accordion-item" data-accordion-item>
                
                        <a href="#" class="accordion-title">Footer Settings</a>

                        <div class="accordion-content" data-tab-content>

                            <div class="grid-x">

                                <div class="large-6 cell">

                                    <div id="left-footer-message"></div>

                                    <label>Left Footer</label>

                                    <textarea id="left-footer" name="left-footer" rows="10">' . 
                                    
                                        wp_unslash ( get_option ( 'left_footer' ) )
                                    
                                    . '</textarea>

                                    <button id="save-left-footer" class="submit success button">Save</button>

                                </div>
                            
                                <div class="large-6 cell">

                                    <div id="youtube-url-message"></div>

                                    <label>Youtube URL</label>

                                    <input 
                                
                                        id="youtube-url" 
                                        
                                        type="text" name="youtube-url" 
                                        
                                        placeholder="Youtube URL" 

                                        value="' . wp_unslash ( get_option ( 'youtube_url' ) ) . '"
                                
                                    />

                                    <button id="save-youtube-url" class="submit success button">Save</button>

                                    <br/><br/>

                                    <div id="twitter-url-message"></div>

                                    <label>Twitter URL</label>

                                    <input 
                                
                                        id="twitter-url" 
                                        
                                        type="text" name="twitter-url" 
                                        
                                        placeholder="Twitter URL" 

                                        value="' . wp_unslash ( get_option ( 'twitter_url' ) ) . '"
                                
                                    />

                                    <button id="save-twitter-url" class="submit success button">Save</button>

                                    <br/><br/>

                                    <div id="instagram-url-message"></div>

                                    <label>Instagram URL</label>

                                    <input 
                                
                                        id="instagram-url" 
                                        
                                        type="text" name="instagram-url" 
                                        
                                        placeholder="Instagram URL" 

                                        value="' . wp_unslash ( get_option ( 'instagram_url' ) ) . '"
                                
                                    />

                                    <button id="save-instagram-url" class="submit success button">Save</button>

                                    <br/><br/>

                                    <div id="hubspot-access-token-message"></div>

                                    <label>Hubspot Access Token (Private App)</label>

                                    <input 
                                
                                        id="hubspot-access-token" 
                                        
                                        type="text" name="hubspot-access-token" 
                                        
                                        placeholder="Hubspot Access Token" 

                                        value="' . wp_unslash ( get_option ( 'hubspot_access_token' ) ) . '"
                                
                                    />

                                    <button id="save-hubspot-access-token" class="submit success button">Save</button>

                                    <br/><br/>

                                    <div id="hubspot-lists-message"></div>

                                    <label>Hubspot Subscriber List</label>

                                    ' . fwc_get_hubspot_lists() . '
                            
                                </div>
                        
                            </div>
                    
                
                        </div>
                
                    </li>

                </ul>
                
            </div>
            
        ';

        echo $accordion;

    }

}

if ( ! function_exists ( 'fwc_get_woocommerce_image' ) ) {

    function fwc_get_woocommerce_image ( $product_id, $image_size = 'single-post-thumbnail' ) {

        return wp_get_attachment_image_src (

            get_post_thumbnail_id ( $product_id ),

            $image_size ) [0];

    }

}

if ( ! function_exists ( 'fwc_get_images_gallery' )) {

    function fwc_get_images_gallery ( $attachment_ids, $image_size = 'thumbnail' ) {

        $attachments = [];

        sort ( $attachment_ids );

        foreach ( $attachment_ids as $attachment_id ) {

            $attachments [ $attachment_id ] = wp_get_attachment_image ( $attachment_id, $image_size );

        }

        return $attachments;

    }

}

if ( ! function_exists ( 'fwc_get_product_attachment_ids' ) ) {

    function fwc_get_product_attachment_ids ( $product ) {

        return $product->get_gallery_image_ids ();

    }

}


add_action ( 'add_meta_boxes', 'fwc_create_product_specs_meta_box' );

if ( ! function_exists ( 'fwc_create_product_specs_meta_box' ) ) {

    function fwc_create_product_specs_meta_box () {

        add_meta_box (

            'custom_product_specs_meta_box',

            __( 'Specification', 'fwc-shop' ),

            'fwc_add_specs_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'fwc_add_specs_meta_box' ) ) {

    function fwc_add_specs_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'specs' ) );

        echo '<div class="product_specs">';

        wp_editor ( $content, 'specs', ['textarea_rows' => 10]);

        echo '</div>';

    }

}

add_action ( 'woocommerce_admin_process_product_object', 'fwc_save_product_specs_wysiwyg_field', 10, 1 );


if ( ! function_exists ( 'fwc_save_product_specs_wysiwyg_field' ) ) {

    function fwc_save_product_specs_wysiwyg_field ( $product ) {

        if (  isset( $_POST['specs'] ) )

             $product->update_meta_data ( 'specs', wp_kses_post ( $_POST['specs'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'fwc_add_specs_product_tab', 10, 1 );

if ( ! function_exists ( 'fwc_add_specs_product_tab' ) ) {

    function fwc_add_specs_product_tab ( $tabs ) {

        $tabs ['specs_tab'] = array (

            'title'         => __( 'Specification', 'fwc-shop' ),

            'priority'      => 50,

            'callback'      => 'fwc_display_specs_product_tab_content'

        );

        return $tabs;

    }

}

if ( ! function_exists ( 'fwc_display_specs_product_tab_content' ) ) {

    function fwc_display_specs_product_tab_content () {

        global $product;

        echo wp_unslash ( $product->get_meta ( 'specs' ) );

    }

}

add_action ( 'add_meta_boxes', 'fwc_create_product_warranty_meta_box' );

if ( ! function_exists ( 'fwc_create_product_warranty_meta_box' ) ) {

    function fwc_create_product_warranty_meta_box () {

        add_meta_box (

            'custom_product_warranty_meta_box',

            __( 'Warranty Info', 'fwc-shop' ),

            'fwc_add_warranty_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'fwc_add_warranty_meta_box' ) ) {

    function fwc_add_warranty_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'warranty' ) );

        echo '<div class="product_warranty">';

        wp_editor ( $content, 'warranty', ['textarea_rows' => 10]);

        echo '</div>';

    }

}

add_action ( 'woocommerce_admin_process_product_object', 'fwc_save_product_warranty_wysiwyg_field', 10, 1 );

if ( !function_exists ( 'fwc_save_product_warranty_wysiwyg_field' ) ) {

    function fwc_save_product_warranty_wysiwyg_field ( $product ) {

        if (  isset( $_POST['warranty'] ) )

             $product->update_meta_data ( 'warranty', wp_kses_post ( $_POST['warranty'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'fwc_add_warranty_product_tab', 10, 1 );

if ( ! function_exists ( 'fwc_add_warranty_product_tab' ) ) {

    function fwc_add_warranty_product_tab ( $tabs ) {

        $tabs ['warranty_tab'] = array (

            'title'         => __( 'Warranty Info', 'fwc-shop' ),

            'priority'      => 50,

            'callback'      => 'fwc_display_warranty_product_tab_content'

        );

        return $tabs;
    }

}

if ( ! function_exists ( 'fwc_display_warranty_product_tab_content' ) ) {

    function fwc_display_warranty_product_tab_content () {

        global $product;

        echo wp_unslash ( $product->get_meta ( 'warranty' ) );

    }

}

add_action ( 'add_meta_boxes', 'fwc_create_product_shipping_meta_box' );

if ( ! function_exists ( 'fwc_create_product_shipping_meta_box' ) ) {

    function fwc_create_product_shipping_meta_box () {

        add_meta_box (

            'custom_product_shipping_meta_box',

            __( 'Shipping Info', 'fwc-shop' ),

            'fwc_add_shipping_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'fwc_add_shipping_meta_box' ) ) {

    function fwc_add_shipping_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'shipping' ) );

        echo '<div class="product_shipping">';

        wp_editor ( $content, 'shipping', ['textarea_rows' => 10]);

        echo '</div>';
    }

}

add_action( 'woocommerce_admin_process_product_object', 'fwc_save_product_shipping_wysiwyg_field', 10, 1 );

if ( ! function_exists ( 'fwc_save_product_shipping_wysiwyg_field' ) ) {

    function fwc_save_product_shipping_wysiwyg_field ( $product ) {

        if (  isset( $_POST['shipping'] ) )

             $product->update_meta_data ( 'shipping', wp_kses_post ( $_POST['shipping'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'fwc_add_shipping_product_tab', 10, 1 );

if ( ! function_exists ( 'fwc_add_shipping_product_tab' ) ) {

    function fwc_add_shipping_product_tab ( $tabs ) {

        $tabs ['shipping_tab'] = array (

            'title'         => __( 'Shipping Info', 'fwc-shop' ),

            'priority'      => 50,

            'callback'      => 'fwc_display_shipping_product_tab_content'

        );

        return $tabs;
    }

}

if ( ! function_exists ( 'fwc_display_shipping_product_tab_content' ) ) {

    function fwc_display_shipping_product_tab_content () {

        global $product;

        echo wp_unslash ( $product->get_meta ( 'shipping' ) );

    }
}


add_action ( 'add_meta_boxes', 'fwc_create_product_seller_meta_box' );

if ( ! function_exists ( 'fwc_create_product_seller_meta_box' ) ) {

    function fwc_create_product_seller_meta_box () {

        add_meta_box (

            'custom_product_seller_meta_box',

            __( 'Seller Profile', 'fwc-shop' ),

            'fwc_add_seller_meta_box',

            'product',

            'normal',

            'default'

        );
    }
}

if ( ! function_exists ( 'fwc_add_seller_meta_box' ) ) {

    function fwc_add_seller_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'seller' ) );

        echo '<div class="product_seller">';

        wp_editor ( $content, 'seller', ['textarea_rows' => 10]);

        echo '</div>';
    }
}

add_action( 'woocommerce_admin_process_product_object', 'fwc_save_product_seller_wysiwyg_field', 10, 1 );

if ( ! function_exists ( 'fwc_save_product_seller_wysiwyg_field' ) ) {

    function fwc_save_product_seller_wysiwyg_field ( $product ) {

        if (  isset( $_POST['seller'] ) )

            $product->update_meta_data ( 'seller', wp_kses_post ( $_POST['seller'] ) );
    }

}


add_filter ( 'woocommerce_product_tabs', 'fwc_add_seller_product_tab', 10, 1 );

if ( ! function_exists ( 'fwc_add_seller_product_tab' ) ) {

    function fwc_add_seller_product_tab ( $tabs ) {

        $tabs ['seller_tab'] = array (

            'title'         => __( 'Seller Profile', 'fwc-shop' ),

            'priority'      => 50,

            'callback'      => 'fwc_display_seller_product_tab_content'

        );

        return $tabs;
    }

}


if ( ! function_exists ( 'fwc_display_seller_product_tab_content' ) ) {

    function fwc_display_seller_product_tab_content () {

        global $product;

        echo wp_unslash ( $product->get_meta ( 'seller' ) );

    }

}     

add_action( 'wp_ajax_nopriv_subscriber_email', 'fwc_ajax_post_subscriber_email_handler' );

add_action( 'wp_ajax_subscriber_email', 'fwc_ajax_post_subscriber_email_handler' );

if ( !function_exists ( 'fwc_ajax_post_subscriber_email_handler' ) ) {

    function fwc_ajax_post_subscriber_email_handler ( $subscriber_email ) {

        $hubspot_acess_token = get_option ( 'hubspot_access_token' );

        $hubspot_list_url = 'https://api.hubapi.com/contacts/v1/lists/' . get_option ( 'hubspot_list_id' ) . '/add';

        $body = [

            'Email' => $subscriber_email,

        ];

        $body = json_encode( $body );

        $args = [

            'body'        => $body,

            'headers'     => [

                'Authorization' => "Bearer ${hubspot_acess_token}",
    
                'Content-Type' => 'application/json'

            ],

            'timeout'     => 60,

            'redirection' => 5,

            'blocking'    => true,

            'httpversion' => '1.0',

            'sslverify'   => false,

            'data_format' => 'body',

        ];

        $response = wp_remote_post ( $hubspot_list_url, $args );

        if ( $response['response']['code'] === 200 ) {
                
            return $response;

        } else {

            return 'There was an error subscribing to the list. Please try again later';

        }

        wp_die();

    }   

}

if ( !function_exists ( 'fwc_get_hubspot_lists' ) ) {

    function fwc_get_hubspot_lists ( ) {

        $hubspot_acess_token = get_option ( 'hubspot_access_token' );

        $hubspot_private_app_url = 'https://api.hubapi.com/contacts/v1/lists';
        
        $args = array (

            'headers' => array (

                'Authorization' => "Bearer ${hubspot_acess_token}",
        
                'Content-Type' => 'application/json'

            )

        );

        $response = wp_remote_get ( $hubspot_private_app_url, $args );

        if ( $response['response']['code'] === 200 ) {

            $body = json_decode($response['body']);

            $lists = $body->lists;

            $select = '<select id="hubspot-lists" name="hubspot-lists">';

            foreach ( $lists as $list ) {

                $select .= '<option value="' . $list->listId . '">' . $list->name . '</option>';

            }

            $select .= '</select>';

            return $select;

        } else {

            return 'There was an error selecting subscriber list. Please try again later';

        }

    }

}


if ( ! function_exists ( 'fwc_getMenu' ) ) {

    function fwc_getMenu ( ) {

        if ( has_nav_menu ( 'primary' ) ) {

            $theme_location = wp_get_nav_menu_name ( 'primary' );

            $menu_items = wp_get_nav_menu_items ( $theme_location );

      	         function fwc_buildMenu ( $ID, $menu_items ) {

    	             $menu = array ();

    	             foreach ( $menu_items as $menu_item ) {

                         if ( ( int ) $menu_item->menu_item_parent === $ID )  {

                             $menu[ $menu_item->title ] = array (

    		                      'url'      => $menu_item->url,

    		                      'children' => fwc_buildMenu ( $menu_item->ID, $menu_items )

                              );

                         }

    	             }

    	             return $menu;
                 }

            return fwc_buildMenu ( 0, $menu_items );

        }

    }

}

?>
