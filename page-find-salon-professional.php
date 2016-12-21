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
$prefix2 = '_ss_directory_';
get_header(); ?>

<div id="content-block">
<div class="wrap-professional">
	<div class="directory-professional">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
    
    <div id="tabs" class="dir-pro-chart">
    	<div class="pro-slide-block">
            <div class="pro-slide-left"><img src="<?php bloginfo('template_directory') ?>/images/arrow-prev.png" alt="arrow-prev"></div>
            <div class="pro-slide-middle jcarousel">
            	<ul>
					<?php
					$catArr = array();
                    $args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'taxonomy' => 'directory-category',
                    );
                    
                    $categories = get_categories($args);
                    foreach($categories as $category) { 
						$catArr[$category->term_id] = $category->slug;
					?>
                    <li><a href="#tabs-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>    
                    <?php  
                    }
                    ?>    
                </ul>
			</div>
            
            <div class="pro-slide-right"><img src="<?php bloginfo('template_directory') ?>/images/arrow-next.png" alt="arrow-next"></div>
        </div>
		<?php foreach($catArr as $catId=>$catSlug) { ?>
			<div class="ss-tab" id="tabs-<?php echo $catId; ?>">
			<table width="100%" border="0">
			<thead>
			  <tr>
				<th width="50%">Salon Name / Professional</td>
				<th width="25%">Suite</td>
				<th width="25%">Direct Phone Number</td>
			  </tr>
			</thead>
			<tbody>
            <?php
			// WP_Query arguments
			$args = array (
				'post_type'             => 'directory',
				'post_status'           => 'publish',
				//'orderby'				=> 'menu_order',
				'order'					=> 'ASC',
				'posts_per_page'		=> -1,
				'orderby'   			=> 'meta_value_num',
				'meta_key'  			=> $prefix2.'suite_number',				
				'tax_query' => array(
					array(
						'taxonomy' => 'directory-category',
						'field'    => 'slug',
						'terms'    => $catSlug,
					),
				),				
			);
			
			// The Query
			$query = new WP_Query( $args );
			
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
			?>
                  <tr>
                    <td width="50%">
                        <div class="salon-name"><a href="<?php the_permalink() ?>"><?php echo get_pm($prefix2.'salon_name'); ?></a></div>
                        <div class="salon-text"><?php //the_title(); ?><?php echo get_pm($prefix2.'owner_first_name'); ?> <?php echo get_pm($prefix2.'owner_last_name'); ?></div>
                    </td>
                    <td width="25%" class="salon-text"><?php echo get_pm($prefix2.'suite_number'); ?></td>
                    <td width="25%" class="salon-text"><?php echo get_pm($prefix2.'telephone'); ?></td>
                  </tr>
            <?php
				}
			}
			// Restore original Post Data
			wp_reset_postdata();
			?>
			</tbody>
            </table>
            </div>
            <?php
		} 
		?>
    </div>
    
    <div class="professional-field">
    	<div class="salon-text2">*  Accepts Sedora Salons Gift Certificates</div>
        <p align="center" class="prepand2">Sedora Salons makes it easy and affordable for you to start up your own salon</p>
    </div>
    <div class="professional-field">
    	<div class="professional-banner"><a href="coupons"><img src="<?php bloginfo('template_directory') ?>/images/money-saving.jpg" alt="Money Saving Coupons"></a></div>
      <div class="professional-banner"><a href="gift-certificate"><img src="<?php bloginfo('template_directory') ?>/images/gift.jpg" alt="Gift Certificates"></a></div>    	
    </div>

<script>
jQuery(function($) {
	$( "#tabs" ).tabs({
		activate: function( event, ui ) {
			var scr = $(window).scrollTop();
			window.location.hash = ui.newPanel.selector;
			$(window).scrollTop(scr);
		}	
	});
	
	/*$( ".pro-slide-right" ).click(function() {
	  $( "#ss-tab-ul" ).animate({ "left": "+=50px" }, "fast" );
	});
	$( ".pro-slide-left" ).click(function() {
	  $( "#ss-tab-ul" ).animate({ "left": "-=50px" }, "fast" );
	});	*/
	
	$('.jcarousel').jcarousel();
	
	$('.pro-slide-right').click(function() {
		$('.jcarousel').jcarousel('scroll', '+=1');
	});
	
	$('.pro-slide-left').click(function() {
		$('.jcarousel').jcarousel('scroll', '-=1');
	});	
	
});
</script>

</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
