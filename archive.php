<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sedora
 */
 
get_header(); ?>

<div id="content-block">
<div class="wrap-head">
	<?php if ( have_posts() ) : ?>

        <div class="page-block">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </div>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'content' ); ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>
</div>
</div>

<?php get_footer(); ?>
