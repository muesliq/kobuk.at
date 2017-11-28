<?php

add_action('after_setup_theme', 'theme_setup');

if (!function_exists('theme_setup')):
    function theme_setup() {
        /* add editor styles */
        add_editor_style('editor-style.css');

        /* locale */
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file)) {
            require_once( $locale_file );
        }

        /* enable menus */
        add_theme_support( 'menus' );

        /* remove admin toolbar in frontend */
        add_filter('show_admin_bar', '__return_false');

        /* disable automatic updates */
        add_filter( 'automatic_updater_disabled', '__return_true' );

        /* add admin stylesheet */
        add_action( 'admin_enqueue_scripts', 'custom_load_admin_style' );

        /* custom comment form success message */
        add_filter( 'comment_post_redirect', 'custom_comment_form_redirect' );

        /* custom pagination base */
        //add_action( 'init', 'custom_pagination_base' );
    }
endif;

/* load custom admin css */
function custom_load_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}

/* custom pagination base */
function custom_pagination_base() {
    global $wp_rewrite;

    /* set name depending on language */
    $paginationBase = 'seite';

    /* set pagination base */
    $wp_rewrite->pagination_base = $paginationBase;
    $wp_rewrite->flush_rules();
}

/* echos the body class(es)
 */
function custom_echo_body_class() {
    echo implode( ' ', get_body_class() );
}

/* echos a textelement
 *
 * @param string title of textelement
 * @param string either 'text', 'textblock', 'html_text', 'image', 'file'
 */
function custom_echo_textelement( $postTitle, $field = 'text' ) {
    echo custom_get_textelement( $postTitle, $field );
}

/* returns a textelement
 *
 * @param string title of textelement
 * @param string either 'text', 'textblock', 'html_text', 'image', 'file'
 */
function custom_get_textelement( $postTitle, $field = 'text' ) {
    $post = get_page_by_title( $postTitle, 'object', 'textelement' );
    $postId = $post->ID;

    if( function_exists('icl_object_id') ) {
        $postId = icl_object_id( $postId, 'post', true);
    }

    $value = get_field( $field, $postId );

    return $value;
}

/* returns all navigation items
 *
 * @param int menu id
 * @param int parent id
 * @param string parent type
 */
function custom_get_navigation_items( $menuId, $parentId = 0, $parentType = 'menu_item' ) {
    $navigationItems = wp_get_nav_menu_items( $menuId );
    $filteredNavigationItems = array();

    if( !$navigationItems ) {
        return $filteredNavigationItems;
    }

    foreach( $navigationItems as $navigationItem ) {
        if( $parentType == 'menu_item' ) {
            if( $navigationItem->menu_item_parent == $parentId ) {
                $filteredNavigationItems[] = $navigationItem;
            }
        }
        elseif( $parentType == 'post' ) {
            if( $navigationItem->post_parent == $parentId ) {
                $filteredNavigationItems[] = $navigationItem;
            }
        }
    }

    return $filteredNavigationItems;
}

/* format date */
function custom_format_date( $date ) {
    $timestamp = strtotime( $date );

    /* set date format depending on language */
    setlocale( LC_TIME, 'de_DE' );
    $dateFormat = '%d. %B %G';

    return utf8_encode( strftime( $dateFormat, $timestamp ) );
}

/* format date */
function custom_format_comment_date( $date ) {
    $timestamp = strtotime( $date );

    /* set date format depending on language */
    setlocale( LC_TIME, 'de_DE' );
    $dateFormat = 'Am %d. %B %G um %H:%M';

    return utf8_encode( strftime( $dateFormat, $timestamp ) );
}

/* shorten text */
function custom_shorten_text( $text, $maxLength ) {
    if( strlen( $text ) > $maxLength ) {
        $text = substr( $text, 0, $maxLength ) . '...';
    }

    return $text;
}

/* custom comment form success message */
function custom_comment_form_redirect( $location ) {
    $pos = strpos( $location, '#' );

    if( $pos ) {
        $location = substr( $location, 0, $pos );
        $location .= '#comment-success';
    }

    return $location;
}