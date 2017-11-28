<?php

$navigationId = custom_get_textelement( 'ID_MAIN_NAVIGATION', 'text' );
$navigationItems = custom_get_navigation_items( $navigationId );

?>

<div class="main-navigation-wrapper">
    <div class="button-wrapper">
        <button class="toggle nav">
            <span class="icomoon icon-icon_burguer_close" aria-hidden="true"></span>
        </button>
    </div>

    <div class="main-navigation-inner">
        <nav class="main">
            <ul>
                <?php foreach( $navigationItems as $navigationsItemIndex => $navigationItem ) { ?>
                    <?php

                    /* get active state */
                    $isActive = false;

                    if( $navigationItem->object_id == $post->ID ) {
                        $isActive = true;
                    }

                    ?>

                    <li class="<?php if( $isActive ) { echo 'active'; } ?>">
                        <a href="<?php echo $navigationItem->url; ?>">
                            <?php echo $navigationItem->title; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="main-navigation-middle visible-xs">
            <div class="container">
                <div class="social-icon-list">
                    <div class="social-icon-item">
                        <a class="social-icon facebook" href="<?php custom_echo_textelement( 'SOCIAL_FACEBOOK', 'text' ); ?>" target="_blank">
                            <span class="icomoon icon-icon_facebook" aria-hidden="true"></span>
                        </a>
                    </div>

                    <div class="social-icon-item">
                        <a class="social-icon twitter" href="<?php custom_echo_textelement( 'SOCIAL_TWITTER', 'text' ); ?>" target="_blank">
                            <span class="icomoon icon-icon_twitter" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <?php include( TEMPLATEPATH . '/templates/components/category-list-1.php' ); ?>
                <?php include( TEMPLATEPATH . '/templates/components/category-list-2.php' ); ?>
            </div>
        </div>

        <?php include( TEMPLATEPATH . '/templates/components/main-navigation-bottom.php' ); ?>
    </div>
</div>