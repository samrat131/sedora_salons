<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sedora
 */

get_header(); ?>

<div id="content-block">
<div class="wrap-subcontent">
    <div class="sabine-block">
		<?php if (has_post_thumbnail()) {the_post_thumbnail('full');} ?>
        <?php while ( have_posts() ) : the_post(); ?>
	        <h2><?php the_title(); ?></h2>
            <div class="post-content">
            <?php the_content(); ?>
            </div>
        <?php endwhile; // End of the loop. ?>
    </div>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
