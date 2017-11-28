<?php

$navigationId = custom_get_textelement( 'ID_META_NAVIGATION_BOTTOM', 'text' );
$navigationItems = custom_get_navigation_items( $navigationId );

?>

<nav class="meta">
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

        <li>
            <a href="<?php echo wp_login_url(); ?>">
                <?php custom_echo_textelement( 'NAVIGATION_LOGIN', 'text' ); ?>
            </a>
        </li>
    </ul>
</nav>