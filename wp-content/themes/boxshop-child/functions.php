<?php 
function boxshop_child_register_scripts(){
    $parent_style = 'boxshop-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array('boxshop-reset'), boxshop_get_theme_version() );
    wp_enqueue_style( 'boxshop-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'boxshop_child_register_scripts' );

/**
 *
 * You can find the complete tutorial for this here:
 * https://pluginrepublic.com/woocommerce-custom-fields
 *
 * Alternatively, check out the plugin
 * https://pluginrepublic.com/wordpress-plugins/woocommerce-product-add-ons-ultimate/
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the custom text field
 * @since 1.0.0
 */
function cfwc_create_custom_price_range_field() {
	$args = array(
		'id'            => 'custom_price_range',
		'label'         => __( 'Price Range', 'cfwc' ),
		'class'					=> 'cfwc-custom-field',
		'desc_tip'      => true,
		'description'   => __( 'Enter the Price Range of the product.', 'ctwc' ),
	);
	woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_price_range_field' );

function cfwc_create_custom_field1() {
	$args = array(
		'id'            => 'custom_field1',
		'label'         => __( 'Fall height', 'cfwc' ),
		'class'					=> 'cfwc-custom-field',
		'desc_tip'      => true,
		'description'   => __( 'Enter the Price Range of the product.', 'ctwc' ),
	);
	woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field1' );

function cfwc_create_custom_field2() {
	$args = array(
		'id'            => 'custom_field2',
		'label'         => __( 'Fall space', 'cfwc' ),
		'class'					=> 'cfwc-custom-field',
		'desc_tip'      => true,
		'description'   => __( 'Enter the Price Range of the product.', 'ctwc' ),
	);
	woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field2' );


function cfwc_create_custom_field3() {
	$args = array(
		'id'            => 'custom_field3',
		'label'         => __( 'Install time', 'cfwc' ),
		'class'					=> 'cfwc-custom-field',
		'desc_tip'      => true,
		'description'   => __( 'Enter the Price Range of the product.', 'ctwc' ),
	);
	woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field3' );
/**
 * Save the custom field
 * @since 1.0.0
 */
function cfwc_save_custom_field( $post_id ) {
	$product = wc_get_product( $post_id );
	$title = isset( $_POST['custom_price_range'] ) ? $_POST['custom_price_range'] : '';
	$custom_field1 = isset( $_POST['custom_field1'] ) ? $_POST['custom_field1'] : '';
	$custom_field2 = isset( $_POST['custom_field2'] ) ? $_POST['custom_field2'] : '';
	$custom_field3 = isset( $_POST['custom_field3'] ) ? $_POST['custom_field3'] : '';
	$product->update_meta_data( 'custom_price_range', sanitize_text_field( $title ) );
	$product->update_meta_data( 'custom_field1', sanitize_text_field( $custom_field1 ) );
	$product->update_meta_data( 'custom_field2', sanitize_text_field( $custom_field2 ) );
	$product->update_meta_data( 'custom_field3', sanitize_text_field( $custom_field3 ) );
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'cfwc_save_custom_field' );

/**
 * Display custom field on the front end
 * @since 1.0.0
 */
function cfwc_display_custom_field() {
    global $post;
    // Check for the custom field value
    $product = wc_get_product( $post->ID );
    $title = $product->get_meta( 'custom_price_range' );
    // Only display our field if we've got a value for the field title
    if($title)
    printf(
    "
        <div>
            <label class  = 'custom_price_range' id = 'custom_price_range'></label>
        </div>
        <script>
            var element = document.getElementById('custom_price_range'); 
            switch('{$title}')
            {
                case '1': element.innerHTML = '£';
                        break;
                case '2': element.innerHTML = '££';
                        break;
                case '3': element.innerHTML = '£££';
                        break;
                case '4': element.innerHTML = '££££';
                        break;
                case '5': element.innerHTML = '£££££';
                        break;
                default:  element.innerHTML = '';
                break;
            }
        </script>
        <style>
        .custom_price_range {
            width: fit-content;
            background-color: black;
            padding:10px;
            border-radius:100px;
            font-size:16px;
            color:white;
            margin-bottom:5px;
        }
        </style>
    ",
    esc_html( $title )
    );
}
add_action( 'woocommerce_single_product_summary', 'cfwc_display_custom_field',3 );
   /**
 * Validate the text field
 * @since 1.0.0
 * @param Array $passed Validation status.
 * @param Integer $product_id Product ID.
 * @param Boolean $quantity Quantity
 */



 function cfwc_validate_custom_field( $passed, $product_id, $quantity ) {
    if( empty( $_POST['cfwc-title-field'] ) ) {
        // Fails validation
        $passed = false;
        wc_add_notice( __( 'Please enter a value into the text field', 'cfwc' ), 'error' );
    }
    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'cfwc_validate_custom_field', 10, 3 );




remove_action('woocommerce_after_shop_loop_item', 'boxshop_template_loop_product_title', 20);
add_action('woocommerce_after_shop_loop_item', 'boxshop_template_loop_product_title1', 25);

function boxshop_template_loop_product_title1(){
	global $post, $product;
    
    $title = get_post_meta( $post->ID, 'custom_price_range', true );
    $custom_field1 = get_post_meta( $post->ID, 'custom_field1', true );
    $custom_field2 = get_post_meta( $post->ID, 'custom_field2', true );
    $custom_field3 = get_post_meta( $post->ID, 'custom_field3', true );
    $div1 = $title ? "<div style='justify-content:center; display: flex'>
                        <label class  = 'custom_price_range' id = 'custom_price_range{$post->ID}'></label>
                        </div>" : "";
    $div2 = ($custom_field1 || $custom_field2 || $custom_field3) ? "<div style='justify-content:center; display: flex'>
            <div class ='spliter_div'>
                <img class ='img1' src = '../../wp-includes/images/fall_height.png'/>
                <span  style = 'padding-top:10px'>{$custom_field1}</span>
            </div>
            <div class ='spliter_div'>
                <img class ='img1' src = '../../wp-includes/images/fall_space.png'/>
                <span  style = 'padding-top:10px'>{$custom_field2}</span>
            </div>
            <div class ='spliter_div'>
                <img class ='img1' src = '../../wp-includes/images/install_time.png'/>
                <span  style = 'padding-top:10px'>{$custom_field3}</span>
            </div>
        </div>" : "";
    // Only display our field if we've got a value for the field title
    if($title || $custom_field1 || $custom_field2 || $custom_field3)
    printf(
    "<div  class='custom_div'>{$div1}{$div2}
        <script>
            var element = document.getElementById('custom_price_range{$post->ID}'); 
            switch('{$title}')
            {
                case '1': element.innerHTML = '£';
                        break;
                case '2': element.innerHTML = '££';
                        break;
                case '3': element.innerHTML = '£££';
                        break;
                case '4': element.innerHTML = '££££';
                        break;
                case '5': element.innerHTML = '£££££';
                        break;
                default:  element.innerHTML = '';
                break;
            }
        </script>
        <style>
        .custom_price_range {
            width: fit-content;
            background-color: black;
            padding:10px;
            border-radius:100px;
            font-size:16px;
            color:white;
            margin-bottom:5px;
        }
        .img1{
            
            width:40px !important;
            height:40px !important;
        }
        .custom_div{
            border: 1px solid red;   
            padding:1px 10px 1px 10px;
            margin-bottom:10px;
        }
        .spliter_div {
            display: flex; 
            align-items: center;
            flex-direction:column;
            padding:0 10px 10px 10px;
        }
        </style>
    </div>",
    esc_html( $title )
    );
}