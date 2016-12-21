<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sedora
 */

get_header(); ?>

<div id="content-block">
<div class="wrap-subcontent">
    <div class="contact-block">
    	<div class="contact-left"><?php if (has_post_thumbnail()) {the_post_thumbnail('full');} ?></div>
        <div class="contact-right">
			<?php while ( have_posts() ) : the_post(); ?>
	            <?php the_content(); ?>
				<?php //get_template_part( 'template-parts/content', 'page' ); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;*/
				?>
			<?php endwhile; // End of the loop. ?>
        </div>    	
    </div>
</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
