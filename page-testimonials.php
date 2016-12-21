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
<div class="wrap-testimonial">

	<div class="cycle-slideshow" data-cycle-slides="> div.testimonial-slide-block" data-cycle-timeout="5000" data-cycle-prev=".testimonial-slide-left" data-cycle-next=".testimonial-slide-right">
	<?php
    // WP_Query arguments
    $args = array (
        'post_type'             => 'testimonial',
        'post_status'           => 'publish',
        'orderby'				=> 'menu_order',
        'order'					=> 'ASC',
        'meta_key'     			=> '_ss_testimonial_type',
        'meta_value'   			=> 'slide',			
    );
    
    // The Query
    $query = new WP_Query( $args );
    
    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
			
    ?>
	<div class="testimonial-slide-block">
        <?php if( $query->found_posts > 1) { ?><div class="testimonial-slide-left"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-left.png" alt="arrow-lef"></div><?php } ?>
        <div class="testimonial-slide-middle" itemscope itemprop="review" itemtype="http://schema.org/Review">
            <p itemprop="reviewBody"><?php the_content(); ?></p>
            <table border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto 0 auto" itemprop="author" itemscope itemtype="http://schema.org/Person">
              <tr valign="middle">
                <td  align="right" style="padding-right:15px"  width="75">
				<?php echo get_img('_ss_testimonial_round_image'); ?></td>
                <td class="reviewer2" itemprop="name"><?php the_title(); ?></td>
              </tr>
            </table>
        </div>
        <?php if( $query->found_posts > 1) { ?><div class="testimonial-slide-right"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-right.png" alt="arrow-right1"></div><?php } ?>
    </div>
	<?php		
        }
    }
    // Restore original Post Data
    wp_reset_postdata();
	?>
    </div>
    
    <div class="testimonial-field">
		<?php
        // WP_Query arguments
        $args = array (
            'post_type'             => 'testimonial',
            'post_status'           => 'publish',
            'orderby'				=> 'menu_order',
            'order'					=> 'ASC',
            'meta_key'     			=> '_ss_testimonial_type',
            'meta_value'   			=> 'featured',
			'posts_per_page'		=> 3
        );
        
        // The Query
        $query = new WP_Query( $args );
        
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
        ?>
    	<div class="item-part">
        	<div><?php if (has_post_thumbnail()) { the_post_thumbnail('full'); } ?></div>
        	<h4 class="prepand3"><?php the_title(); ?></h4>
            <p class="prepand2"><?php the_content(); ?></p>
        </div>
		<?php		
            }
        }
        // Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
    
    <div class="testimonial-field">
		<?php
        // WP_Query arguments
        $args = array (
            'post_type'             => 'testimonial',
            'post_status'           => 'publish',
            'orderby'				=> 'menu_order',
            'order'					=> 'ASC',
            'meta_key'     			=> '_ss_testimonial_type',
            'meta_value'   			=> 'regular',
        );
        
        // The Query
        $query = new WP_Query( $args );
        $i=0;
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
        ?>
        <div class="testimonial-more<?php echo ($i%2==0)?'':'2'; ?>" itemscope itemprop="review" itemtype="http://schema.org/Review">
            <?php the_content(); ?>
            <table border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;" itemprop="author" itemscope itemtype="http://schema.org/Person">
              <tr valign="middle">
                <td  align="right" style="padding-right:15px"  width="75"><?php echo get_img('_ss_testimonial_round_image'); ?></td>
                <td class="reviewer2 itemprop="name""><?php the_title(); ?></td>
              </tr>
            </table>
        </div>
		<?php		
		$i++;
            }
        }
        // Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
    
</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
