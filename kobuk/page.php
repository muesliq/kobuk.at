<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>