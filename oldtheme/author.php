<?php /**/?><?php
/*
Template Name: Author Page
*/
?>
<?php get_header() ?>
	
	<div id="container">
		<div id="content">


<!-- This sets the $curauth variable -->
<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
<h1 class="entry-title"><?php echo $curauth->display_name; ?></h1>
<div class="entry-content">
<p><?php
if(userphoto_exists($wp_query->get_queried_object()))
    userphoto($wp_query->get_queried_object());
else
    echo "";
?> 

<?php echo $curauth->user_description; ?></p>
<p><strong>Blog:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p><br style="clear:both;" />
<h2 class="entry-title">Die neuesten Beiträge von <?php echo $curauth->display_name; ?>:</h2>
<ul>
<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php the_title(); ?></a>
</li>
<?php endwhile; else: ?>
<p><?php _e('No posts by this author.'); ?></p>
<?php endif; ?>
<!-- End Loop -->
</ul></div>





<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to enable comments on pages! ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php thematic_sidebar() ?>
<?php get_footer() ?>
