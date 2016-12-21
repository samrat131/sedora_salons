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
$_ss_prefix = '_ss_giftcert_';
get_header(); ?>

<div id="content-block">
<div class="wrap-testimonial">
	<div class="gift-text"><?php echo get_pm($_ss_prefix.'header_text'); ?></div>
</div>
</div>

<div id="slider-block">
	<ul>
    	<li>
        	<div class="left-arrow-gift"><img src="<?php bloginfo('template_directory') ?>/images/arrow-left-small.png" alt=""></div>
            <div class="right-arrow-gift"><img src="<?php bloginfo('template_directory') ?>/images/arrow-right-small.png" alt=""></div>
            
            
            <div class="gift-mid cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="30000" data-cycle-prev=".left-arrow-gift" data-cycle-next=".right-arrow-gift">
            <?php $captions = get_pm('_own_salon_header_caption'); 
			//print_r($captions);
			foreach($captions as $caption) { 
			 echo '<div style="width:100%;"><h2 style="text-align:center;">'.$caption['image_caption'].'</h2></div>';
			}
			?>
            </div>
        	<img src="<?php echo get_pm('_own_salon_header_image'); ?>" width="100%" alt="sedora-header-bg">
        </li>   
	</ul>
</div>

<div id="content-block">
<div class="wrap-subcontent">
	<div class="giftcert-field">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
</div>
</div>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
