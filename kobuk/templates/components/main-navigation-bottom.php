<?php

$navigationId = custom_get_textelement( 'ID_META_NAVIGATION_BOTTOM', 'text' );
$navigationItems = custom_get_navigation_items( $navigationId );

?>

<div class="main-navigation-bottom visible-xs">
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
        </ul>
    </nav>
</div>