<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get next / prev post */
$nextPost = get_next_post();
$prevPost = get_previous_post();

/* get comments */
$comments = get_comments(
    array(
        'post_id' => $post->ID,
        'order' => 'ASC',
        'status' => 'approve'
    )
);

/* comment count */
$numComments = count( $comments );

?>

<div class="article-detail">
    <div class="title-wrapper">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>

    <div class="meta-social-wrapper">
        <div class="article-meta">
            <div class="author">
                <?php the_author_posts_link(); ?>
            </div>

            <div class="date">
                <?php the_date(); ?>
            </div>
        </div>

        <div class="social-button-wrapper">
            <a href="<?php the_permalink(); ?>" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
    </div>

    <div class="article-content content-area">
        <?php the_content(); ?>
    </div>
</div>

<div class="article-paging">
    <?php if( $prevPost ) { ?>
        <div class="left">
            <a class="prev" href="<?php echo get_permalink( $prevPost->ID ); ?>">
                <?php custom_echo_textelement( 'POST_PREV_POST', 'text' ); ?>
            </a>

            <div class="text">
                <?php echo $prevPost->post_title; ?>
            </div>
        </div>
    <?php } ?>

    <?php if( $nextPost ) { ?>
        <div class="right">
            <a class="next" href="<?php echo get_permalink( $nextPost->ID ); ?>">
                <?php custom_echo_textelement( 'POST_NEXT_POST', 'text' ); ?>
            </a>

            <div class="text">
                <?php echo $nextPost->post_title; ?>
            </div>
        </div>
    <?php } ?>
</div>

<div class="comments-wrapper">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                <?php custom_echo_textelement( 'COMMENTS_TAB_TITLE', 'text' ); ?> <span class="number">(<?php echo $numComments; ?>)</span>
            </a>
        </li>
        <li role="presentation">
            <a href="#comments-fb" aria-controls="comments-fb" role="tab" data-toggle="tab">
                <span class="icomoon icon-icon_facebook" aria-hidden="true"></span> <?php custom_echo_textelement( 'COMMENTS_TAB_TITLE', 'text' ); ?>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="comments" class="tab-pane fade in active" role="tabpanel">
            <?php if( comments_open( $post->ID ) ) { ?>
                <div class="comment-form-wrapper">
                    <a name="comment-success"></a>

                    <div class="comment-form-success hidden">
                        <?php custom_echo_textelement( 'COMMENT_SUCCESS_MESSAGE', 'text' ); ?>
                    </div>

                    <?php comment_form(); ?>
                </div>
            <?php } ?>

            <div class="comment-list">
                <h3>
                    <?php echo $numComments; ?> <?php custom_echo_textelement( 'COMMENTS_NUM_COMMENTS', 'text' ); ?>
                </h3>

                <?php foreach( $comments as $comment ) { ?>
                    <?php if( $comment->user_id === $post->post_author ) { ?>
                        <div id="comment-<?php echo $comment->comment_ID; ?>" class="comment-item bypostauthor">
                            <div class="comment-box">
                                <div class="comment-meta image">
                                    <div class="image">
                                        <?php userphoto_the_author_thumbnail(); ?>
                                    </div>

                                    <div class="text">
                                        <strong><?php echo $comment->comment_author; ?> (<?php custom_echo_textelement( 'COMMENTS_AUTHOR', 'text' ); ?>)</strong> - <?php echo custom_format_comment_date( $comment->comment_date ); ?>
                                    </div>
                                </div>

                                <div class="comment-content content-area">
                                    <?php comment_text( $comment->comment_ID ); ?>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div id="comment-<?php echo $comment->comment_ID; ?>" class="comment-item">
                            <div class="comment-box">
                                <div class="comment-meta">
                                    <strong><?php echo $comment->comment_author; ?></strong> - <?php echo custom_format_comment_date( $comment->comment_date ); ?>
                                </div>

                                <div class="comment-content content-area">
                                    <?php comment_text( $comment->comment_ID ); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div id="comments-fb" class="tab-pane fade" role="tabpanel">
            <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-order-by="time"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>