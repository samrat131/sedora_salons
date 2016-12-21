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

<div id="slider-block" class="cycle-slideshow" data-cycle-slides="> ul" data-cycle-timeout="50000" data-cycle-prev=".left-arrow" data-cycle-next=".right-arrow">
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
<ul>
    <li>
        <div class="left-arrow"><img src="<?php bloginfo('template_directory') ?>/images/arrow-left.png" alt=""></div>
        <div class="right-arrow"><img src="<?php bloginfo('template_directory') ?>/images/arrow-right.png" alt=""></div>
      <div class="slide-mid">
        <?php the_content(); ?>
        <div class="view-details"><a href="<?php echo get_pm('_ss_slider_link'); ?>">VIEW DETAILS</a></div>
      </div>
		<?php 
        if ( has_post_thumbnail() ) {
            $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			echo '<img src="' . $full_image_url[0] . '" width="100%" alt="'.get_the_title().'">';
        }
        ?>      
    </li>   
</ul>
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
        	<div><a href="<?php echo get_opt('link_block'.$i) ?>"><img src="<?php echo get_opt('image_block'.$i) ?>" alt="image"></a></div>
        	<h3 class="prepand3"><a href="<?php echo get_opt('link_block'.$i) ?>"><?php echo get_opt('title_block'.$i) ?></a></h3>
            <p class="prepand2"><?php echo get_opt('content_block'.$i) ?></p>
        </div>
        <?php } ?>
        <?php /*?><div class="item-part">
        	<div><img src="<?php bloginfo('template_directory') ?>/images/door.jpg" alt="Door"></div>
        	<h3 class="prepand3">Walkins <br>welcome!</h3>
            <p class="prepand2">Walk-ins are always welcome at Sedora Salons!</p>
        </div>
        
        <div class="item-part">
        	<div><img src="<?php bloginfo('template_directory') ?>/images/couple.jpg" alt="image"></div>
        	<h3 class="prepand3">Gift <br>Certificates</h3>
            <p class="prepand2">Gift certificates are available for purchase in our office.</p>
        </div><?php */?>
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
