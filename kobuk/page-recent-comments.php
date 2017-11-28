<?php
/**
 * Template Name: Aktive Diskussionen
 */
?>

<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get comment posts */
$args = array(
    'numberposts' => 100,
    'orderby' => 'date',
    'order' => 'DESC',
    'suppress_filters' => false,
);

$commentPosts = get_posts( $args );
$commentPostsCount = 0;
$commentPostsMax = 10;

?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php the_content(); ?>

        <div class="discussion-group-list">
            <?php foreach( $commentPosts as $commentPost ) { ?>
                <?php

                /* skip? */
                if( $commentPostsCount == $commentPostsMax ) {
                    break;
                }

                /* get comments */
                $comments = get_comments(
                    array(
                        'post_id' => $commentPost->ID,
                        'order' => 'ASC',
                        'status' => 'approve'
                    )
                );

                /* comment count */
                $numComments = count( $comments );

                ?>

                <?php if( $numComments ) { ?>
                    <div class="discussion-group-item">
                        <h3>
                            <a href="<?php echo get_permalink( $commentPost->ID ); ?>">
                                <?php echo $commentPost->post_title; ?> (<span class="number"><?php echo $numComments; ?></span>)
                            </a>
                        </h3>

                        <div class="discussion-comment-list">
                            <?php foreach( $comments as $comment ) { ?>
                                <div class="discussion-comment-item">
                                    <a href="<?php echo get_permalink( $commentPost->ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo $comment->comment_author; ?><?php if( $comment->user_id === $commentPost->post_author ) { ?> (<?php custom_echo_textelement( 'COMMENTS_AUTHOR', 'text' ); ?>)<?php } ?>:</a> <?php comment_excerpt( $comment->comment_ID ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php $commentPostsCount++; ?>
                <?php } ?>

            <?php } ?>

        </div>

    </div>
</div>

<?php get_footer(); ?>