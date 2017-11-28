<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<?php

/* get search query */
$searchQuery = get_search_query();

?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php custom_echo_textelement( 'SEARCH_PAGE_HEADLINE', 'text' ); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php if( $wp_query->found_posts == 1 ) { ?>
            <?php echo $wp_query->found_posts; ?> <?php custom_echo_textelement( 'SEARCH_PAGE_RESULT', 'text' ); ?> &quot;<?php echo $searchQuery; ?>&quot;
        <?php } else { ?>
            <?php echo $wp_query->found_posts; ?> <?php custom_echo_textelement( 'SEARCH_PAGE_RESULTS', 'text' ); ?> &quot;<?php echo $searchQuery; ?>&quot;
        <?php } ?>
    </div>

    <div class="search-list">
        <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <div class="search-item">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo $post->post_title; ?>
                    </a>
                </h3>

                <div class="excerpt">
                    <?php relevanssi_the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; else: ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>