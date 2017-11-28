<?php

/* get custom fields */
$seoTitle = trim( get_field( 'seo_title' ) );
$seoDescription = trim( get_field( 'seo_description' ) );
$ogTitle = get_field( 'og_title' );
$ogDescription = get_field( 'og_description' );
$ogImage = get_field( 'og_image' );

/* set og tags for offer */
if( is_singular( 'offer' ) ) {
    if( !$ogTitle ) {
        $ogTitle = $post->post_title;
    }

    if( !$ogDescription ) {
        $ogDescription = get_field( 'short_description' );
    }

    if( !$ogImage ) {
        $persons = get_field( 'persons' );
        $image = get_field( 'image' );
        $showPersonImage = get_field( 'show_person_image' );

        /* default image? */
        if( !$image ) {
            $image = custom_get_textelement( 'OFFER_IMAGE_DEFAULT', 'image' );
        }

        if( !$showPersonImage ) {
            $ogImage = $image;
        }
        elseif( $persons ) {
            $ogImage = get_field( 'image', $persons[0]->ID );
        }
    }
}

?>

<title>
    <?php

    if( $seoTitle == '' ) {
        global $page, $paged;

        wp_title( '|', true, 'right' );
        bloginfo( 'name' );

        $site_description = get_bloginfo( 'description', 'display' );

        if ( $site_description && ( is_home() || is_front_page() ) ) {
            echo " | $site_description";
        }
    }
    else {
        echo $seoTitle;
    }

    ?>
</title>

<?php if( $seoDescription != '' ) { ?>
    <meta name="description" content="<?php echo $seoDescription; ?>">
<?php } ?>

<?php if( $ogTitle ) { ?>
    <meta property="og:title" content="<?php echo $ogTitle; ?>"/>
<?php } ?>

<?php if( $ogDescription ) { ?>
    <meta property="og:description" content="<?php echo $ogDescription; ?>"/>
<?php } ?>

<?php if( $ogImage ) { ?>
    <meta property="og:image" content="<?php echo $ogImage['sizes']['medium']; ?>"/>
<?php } ?>
