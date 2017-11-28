<?php

$navigationId = custom_get_textelement( 'ID_META_NAVIGATION_TOP', 'text' );
$navigationItems = custom_get_navigation_items( $navigationId );

?>

<nav class="meta hidden-sm hidden-xs">
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