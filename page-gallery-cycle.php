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

$_ss_prefix = '_ss_gallery_';
$gallery = array();
$gallery = get_pm($_ss_prefix.'image');
//print_r($gallery); exit;
get_header(); ?>

<div id="content-block">
<div class="wrap-subcontent">
	<?php 
	if(!empty($gallery) && is_array($gallery)) {
		reset( $gallery );
		$first_key = key( $gallery );
		
	?>
    <h2>Gallery</h2>
    <div class="gallery-block">
    	<div class="gallery-placeholder cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout="0"
        >
        
			<?php foreach($gallery as $key=>$img) { 
            $full_image_url = wp_get_attachment_image_src( $key, 'full' );
            ?>
            <div><img src="<?php echo $full_image_url[0]; ?>" alt="gallery-<?php echo $key ?>"></div>
            <?php } ?>
	        
        </div>
        
        <div class="gallery-thumb-block">
        	<div class="gallery-left"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-left.png" alt="arrow-lef"></div>
            <div id="cycle-2" class="cycle-slideshow"
            data-cycle-slides="> div"
            data-cycle-timeout="0"
            data-cycle-prev=".gallery-left"
            data-cycle-next=".gallery-right"
            data-cycle-fx="carousel"
            data-cycle-carousel-visible="5"
            data-cycle-carousel-fluid="true"
            data-allow-wrap="false">
            	
                	<?php foreach($gallery as $key=>$img) { 
					$thumb_image_url = wp_get_attachment_image_src( $key, 'gallery-thumb' );
					?>
                    <div><img src="<?php echo $thumb_image_url[0]; ?>" alt="gallery-thumb-<?php echo $key ?>"></div>
                    <?php } ?>
                
            </div>
            
            <div class="gallery-right"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-right.png" alt="arrow-right1"></div>
        </div>
    </div>
	<script>
    jQuery(document).ready(function($){
    
		var slideshows = $('.cycle-slideshow').on('cycle-next cycle-prev', function(e, opts) {
			// advance the other slideshow
			slideshows.not(this).cycle('goto', opts.currSlide);
		});
		
		$('#cycle-2 .cycle-slide').click(function(){
			alert(index);
			var index = $('#cycle-2').data('cycle.API').getSlideIndex(this);
			slideshows.cycle('goto', index);
		});
    
    });
    </script>
    <?php } else { ?>
	    <h2>Sorry, no gallery image found.</h2>
    <?php } ?>
    
    <div style="clear:both;"></div>
    <div class="gallery-block">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>

    
</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
