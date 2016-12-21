<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sedora
 */

get_header(); ?>

<div id="content-block">
<div class="wrap-subcontent">
	<div class="notfound">Page Not Found</div>
    <div class="notfound2">The Page You Requested Was Not Found</div>
    <div class="back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home page</a></div>
</div>
</div>

<?php get_footer(); ?>
