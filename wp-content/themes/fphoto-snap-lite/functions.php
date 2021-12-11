<?php

/**
 * @package fphoto-snap-lite
 */
require_once get_template_directory() . "/backend/wpcustomizer/customizer.php";

add_image_size('fphoto-snap-lite-home-box-size', 400, 250, true);

add_action('customize_register', 'fphoto_snap_lite_customize_register_custom_controls', 9);

function fphoto_snap_lite_customize_register_custom_controls($wp_customize) {
    get_template_part('backend/wpproupgrade/fphoto_snap_lite', 'sectionpro');
}

function fphoto_snap_lite_customize_controls_js() {
    $theme = wp_get_theme();
    wp_enqueue_script('fphoto-snap-lite-customizer-section-pro-jquery', get_template_directory_uri() . '/backend/wpproupgrade/customize-controls.js', array('customize-controls'), $theme->get('Version'), true);
    wp_enqueue_style('fphoto-snap-lite-customizer-section-pro', get_template_directory_uri() . '/backend/wpproupgrade/customize-controls.css', $theme->get('Version'));
}

add_action('customize_controls_enqueue_scripts', 'fphoto_snap_lite_customize_controls_js');

function fphoto_snap_lite_enqueue_comments_reply() {
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('comment_form_before', 'fphoto_snap_lite_enqueue_comments_reply');

if (!function_exists('fphoto_snap_lite_sanitize_page')) :

    function fphoto_snap_lite_sanitize_page($page_id, $setting) {
        // Ensure $input is an absolute integer.
        $page_id = absint($page_id);
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status($page_id) ? $page_id : $setting->default );
    }

endif;

//widet registartion
function fphoto_snap_lite_widgets_init() {

    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'fphoto-snap-lite'),
        'description'   => esc_html__('Appears on sidebar', 'fphoto-snap-lite'),
        'id'            => 'sidebar-1',
        'before_widget' => '',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3><aside id="" class="widget">',
        'after_widget'  => '</aside>',
    ));
}

add_action('widgets_init', 'fphoto_snap_lite_widgets_init');

// after theme setup hook
if (!function_exists('fphoto_snap_lite_setup')) :

    function fphoto_snap_lite_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('woocommerce');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-header');
        add_theme_support('title-tag');
        add_theme_support("wp-block-styles");
        add_theme_support("responsive-embeds");
        add_theme_support("align-wide");
        add_theme_support('custom-logo', array(
            'height' => 480,
            'width'  => 720,
        ));


        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'fphoto-snap-lite'),
            'footer'  => esc_html__('Footer Menu', 'fphoto-snap-lite'),
        ));
        add_theme_support('custom-background', array(
            'default-color' => 'ffffff'
        ));

        $defaults = array(
            'default-image'      => get_template_directory_uri() . '/images/slider1.jpg',
            'default-text-color' => 'ffffff',
            'width'              => 1400,
            'height'             => 500,
            'uploads'            => true,
            'wp-head-callback'   => 'fphoto_snap_lite_header_style',
        );
        add_theme_support('custom-header', $defaults);
    }

endif; // fphoto_snap_lite_setup
add_action('after_setup_theme', 'fphoto_snap_lite_setup');

if (!isset($content_width))
    $content_width = 900;

//logo header style
function fphoto_snap_lite_header_style() {
    $fphoto_snap_lite_header_text_color = get_header_textcolor();
    if (get_theme_support('custom-header', 'default-text-color') === $fphoto_snap_lite_header_text_color) {
        return;
    }
    echo '<style id="fphoto-snap-lite-custom-header-styles" type="text/css">';
    if ('blank' !== $fphoto_snap_lite_header_text_color) {
        echo '.logotxt, .logotxt a
			 {
				color: #' . esc_attr($fphoto_snap_lite_header_text_color) . '
			}';
    }
    echo '</style>';
}

//define css and js in header part
function fphoto_snap_lite_style_js() {
    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/frontend/bootstrap/css/bootstrap.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/frontend/css/font-awesome.css');
    wp_enqueue_style('fphoto-snap-lite-basic-style', get_stylesheet_uri());
    wp_enqueue_style('fphoto-snap-lite-style', get_template_directory_uri() . '/frontend/main.css');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/frontend/bootstrap/js/bootstrap.js', array('jquery'));
    wp_enqueue_script('fphoto-snap-lite-toggle-jquery', get_template_directory_uri() . '/frontend/js/toggle.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'fphoto_snap_lite_style_js');

//wp_print_footer_scripts hooks
function fphoto_snap_lite_skip_link_focus_fix() {
    echo '<script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>';

    //menu dropdown accessibility
    echo '<script type="text/javascript">

        jQuery(document).ready(function () {
            jQuery(".nav").fphotosnapliteaccessibleDropDown();
        });

        jQuery.fn.fphotosnapliteaccessibleDropDown = function () {
            var el = jQuery(this);

            /* Make dropdown menus keyboard accessible */

            jQuery("a", el).focus(function () {
                jQuery(this).parents("li").addClass("hover");
            }).blur(function () {
                jQuery(this).parents("li").removeClass("hover");
            });
        }
    </script>';
}

add_action('wp_print_footer_scripts', 'fphoto_snap_lite_skip_link_focus_fix');

//content excerpt function
function fphoto_snap_lite_get_excerpt($postid, $post_count_size) {
    $excerpt = get_post_field('post_content', $postid);
    $excerpt = preg_replace(" ([.*?])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $post_count_size);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    return $excerpt;
}
