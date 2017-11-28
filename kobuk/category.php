<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get category */
$category = get_category( get_query_var( 'cat' ) );

/* query posts */
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$postsPerPage = 10;
$queryArgs = array(
    'posts_per_page' => $postsPerPage,
    'paged' => $paged,
    'category__in' => $category->term_id
);

/* override global wp_query */
$wp_query = new WP_Query( $queryArgs );

?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php custom_echo_textelement( 'CATEGORY_HEADLINE', 'text' ); ?> <?php echo $category->name; ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <div class="article-list">
            <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <div class="article-item">
                    <div class="title-wrapper">
                        <h2>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="article-meta">
                            <div class="author">
                                <?php the_author_posts_link(); ?>
                            </div>

                            <div class="date">
                                <?php the_date(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="article-content content-area">
                        <?php the_content( '' ); ?>
                    </div>

                    <div class="article-bottom">
                        <div class="more-wrapper">
                            <a class="more" href="<?php the_permalink(); ?>">
                                <?php custom_echo_textelement( 'POST_MORE', 'text' ); ?>
                            </a>
                        </div>

                        <div class="social-button-wrapper">
                            <a href="<?php the_permalink(); ?>" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </div>
                    </div>
                </div>

            <?php endwhile; else: ?>
            <?php endif; ?>
        </div>

        <?php if( $wp_query->max_num_pages > 1 ) { ?>
            <div class="paging">
                <?php if( get_next_posts_link() ) { ?>
                    <div class="next">
                        <?php next_posts_link( 'Ältere Beiträge', 0 ); ?>
                    </div>
                <?php } ?>

                <?php if( get_previous_posts_link() ) { ?>
                    <div class="prev">
                        <?php previous_posts_link( 'Neuere Beiträge', 0 ); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>