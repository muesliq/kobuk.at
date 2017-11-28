<?php get_header(); ?>

<?php setup_postdata( $post ); ?>

<div class="page">
    <div class="title-wrapper">
        <h1>
            <?php custom_echo_textelement( 'ERROR_PAGE_HEADLINE', 'text' ); ?>
        </h1>
    </div>

    <div class="page-content content-area">
        <?php custom_echo_textelement( 'ERROR_PAGE_TEXT', 'html_text' ); ?>
    </div>
</div>

<?php get_footer(); ?>