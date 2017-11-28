<?php

/* set unique list id */
$listId = 'list' . rand(1111, 9999);

/* get categories */
$categories = get_categories( array(
    'parent' => 7,
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true,
) );

/* split array */
$length = 5;
$categories1 = array_slice( $categories, 0, $length );
$categories2 = array_slice( $categories, $length - 1 );

?>

<div class="category-list">
    <h3>
        <?php custom_echo_textelement( 'CATEGORY_LIST_MEDIA', 'text' ); ?>
    </h3>

    <ul>
        <?php foreach( $categories1 as $category ) { ?>
            <li>
                <a href="<?php echo get_category_link( $category->term_id ); ?>">
                    <?php echo $category->name; ?> <span class="number">(<?php echo $category->count; ?>)</span>
                </a>
            </li>
        <?php } ?>
    </ul>

    <?php if( $categories2 ) { ?>
        <div id="<?php echo $listId; ?>" class="collapse category-list-collapse">
            <ul>
                <?php foreach( $categories2 as $category ) { ?>
                    <li>
                        <a href="<?php echo get_category_link( $category->term_id ); ?>">
                            <?php echo $category->name; ?> <span class="number">(<?php echo $category->count; ?>)</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <button class="collapse-toggle collapsed" type="button" data-toggle="collapse" data-target="#<?php echo $listId; ?>" aria-expanded="false" aria-controls="<?php echo $listId; ?>">
            <span class="open-collapse">
                <span class="icomoon icon-icon_arrow_down" aria-hidden="true"></span> <?php custom_echo_textelement( 'CATEGORY_LIST_MORE', 'text' ); ?>
            </span>

            <span class="close-collapse">
                <span class="icomoon icon-icon_arrow_top" aria-hidden="true"></span> <?php custom_echo_textelement( 'CATEGORY_LIST_LESS', 'text' ); ?>
            </span>
        </button>
    <?php } ?>
</div>