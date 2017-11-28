<?php
/**
 * Template Name: Autoren
 */
?>

<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get authors */
$args = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'show_fullname' => true,
    'who' => 'authors',
);

$authors = get_users( $args );

?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php the_content(); ?>
    </div>

    <div class="author-list">
        <?php foreach( $authors as $author ) { ?>
            <?php

            $postCount = count_user_posts( $author->ID );

            if( !$postCount ) {
                continue;
            }

            ?>

            <div class="author-item">
                <div class="image-text-wrapper">
                    <div class="image">
                        <?php userphoto_thumbnail( $author->ID ); ?>
                    </div>

                    <div class="text">
                        <a href="<?php echo get_author_posts_url( $author->ID ); ?>">
                            <?php echo get_the_author_meta( 'display_name', $author->ID ); ?>
                        </a> (<?php echo $postCount; ?>)
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>