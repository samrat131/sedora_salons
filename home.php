<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sedora
 */

get_header(); ?>

<div id="slider-block" class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="5000" data-cycle-prev=".left-arrow" data-cycle-next=".right-arrow">
<?php
// WP_Query arguments
$args = array (
	'post_type'             => 'slider',
	'post_status'           => 'publish',
	'orderby'				=> 'menu_order',
	'order'					=> 'ASC',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>
<div style="width:100%;">
    <div class="left-arrow"><img src="<?php bloginfo('template_directory') ?>/images/arrow-left.png" alt=""></div>
    <div class="right-arrow"><img src="<?php bloginfo('template_directory') ?>/images/arrow-right.png" alt=""></div>
    <div class="slide-mid">
    	<?php the_content(); ?>
    	<div class="view-details">
        	<a href="<?php echo get_pm('_ss_slider_link'); ?>"><?php echo get_pm('_ss_slider_button_text')==''?'VIEW DETAILS':get_pm('_ss_slider_button_text'); ?></a>
        </div>
    </div>
    <?php 
    if ( has_post_thumbnail() ) {
    	$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    	echo '<img src="' . $full_image_url[0] . '" width="100%" alt="'.get_the_title().'">';
    }
    ?>
</div>    
<?php		
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
</div>

<div id="content-block">
<div class="wrap-content">
	<h2><?php echo get_opt('section_title') ?></h2>
    <div class="item-block">
    	<?php for($i=1; $i<=3;$i++) { ?>
    	<div class="item-part">
        	<div>
			<?php if($i<3) { ?>
            <a href="<?php echo get_opt('link_block'.$i) ?>">
			<?php } ?>
            <img src="<?php echo get_opt('image_block'.$i) ?>" alt="image">
			<?php if($i<3) { ?>
            </a>
			<?php } ?>
            </div>
        	<h3 class="prepand3">
			<?php if($i<3) { ?>
            <a href="<?php echo get_opt('link_block'.$i) ?>">
			<?php } ?>
			<?php echo get_opt('title_block'.$i) ?>
			<?php if($i<3) { ?>
            </a>
			<?php } ?></h3>
            <p class="prepand2"><?php echo get_opt('content_block'.$i) ?></p>
        </div>
        <?php } ?>
    </div>
</div>
</div>

<?php
// WP_Query arguments
$args = array (
	'post_type'             => 'testimonial',
	'post_status'           => 'publish',
	'orderby'				=> 'rand',
	'order'					=> 'ASC',
	'meta_key'     			=> '_ss_testimonial_show_home',
	'meta_value'   			=> 'on',
	'posts_per_page'		=> 1
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>
<div id="review-block">
<div class="wrap-review" itemscope itemprop="review" itemtype="http://schema.org/Review">
	<?php the_content(); ?>
	<table border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto 0 auto" itemprop="author" itemscope itemtype="http://schema.org/Person">
      <tr valign="middle">
        <td  align="right" style="padding-right:15px"  width="75"><?php echo get_img('_ss_testimonial_round_image'); ?></td>
        <td class="reviewer" itemprop="name"><?php the_title(); ?></td>
      </tr>
    </table>
	<div class="review-more"><a href="<?php echo esc_url( home_url( '/testimonials' ) ); ?>">view more Testimonials</a></div>
</div>
</div>
<?php		
	}
}
// Restore original Post Data
wp_reset_postdata();
?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
