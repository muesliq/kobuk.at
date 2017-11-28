<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get author */
$author = get_userdata( get_query_var( 'author' ) );

/* get posts by author */
$args = array(
    'orderby' => 'date',
    'order' => 'DESC',
    'author' => $author->ID,
    'numberposts' => -1,
);

$authorPosts = get_posts( $args );

?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php echo get_the_author_meta( 'display_name', $author->ID ); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php if( userphoto_exists( $author->ID ) ) { ?>
            <div class="image">
                <?php userphoto( $author->ID ); ?>
            </div>
        <?php } ?>

        <div class="text">
            <p>
                <?php echo get_the_author_meta( 'description', $author->ID ); ?>
            </p>
        </div>
    </div>

    <div class="title-wrapper">
        <h2>
            <?php custom_echo_textelement( 'AUTHOR_POSTS_FROM', 'text' ); ?> <?php echo get_the_author_meta( 'display_name', $author->ID ); ?>
        </h2>
    </div>

    <div class="page-content content-area">
        <ul>
            <?php foreach( $authorPosts as $authorPost ) { ?>
                <li>
                    <a href="<?php echo get_permalink( $authorPost->ID ); ?>">
                        <?php echo $authorPost->post_title; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<?php get_footer(); ?>