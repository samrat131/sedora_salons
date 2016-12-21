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
<style>
</style>
<!--<a style="text-align:left; float:left;" class="prev" href="#prev">Prev</a><a style="text-align:right; float:right;" class="next" href="#next">Next</a>-->
<div id="content-block">
<div class="wrap-subcontent">
	<?php 
	if(!empty($gallery) && is_array($gallery)) {
		reset( $gallery );
		$first_key = key( $gallery );
		
	?>
    <h2>Gallery</h2>
    <div class="gallery-block">
    	
    	<div class="gallery-placeholder">
	        <div class="gal-nav left"><a class="prev" href="#prev"><img class="" src="<?php bloginfo('template_directory') ?>/images/arrow-left.png"></a></div>
            <div class="gal-nav right"><a class="next" href="#prev"><img src="<?php bloginfo('template_directory') ?>/images/arrow-right.png"></a></div>
	        <img id="large-image" src="<?php echo $gallery[$first_key] ?>" alt="sedora-gallery-image">
        </div>
        
        <div class="gallery-thumb-block">
        	<div class="gallery-left"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-left.png" alt="arrow-lef"></div>
            <!--<div class="gallery-thumb-middle"></div>-->
            <div class="jcarousel2">
            	<ul>
                	<?php foreach($gallery as $key=>$img) { 
					$thumb_image_url = wp_get_attachment_image_src( $key, 'gallery-thumb' );
					?>
                    <li><a href="<?php echo $img; ?>"><img src="<?php echo $thumb_image_url[0]; ?>" alt="gallery-thumb-<?php echo $key ?>"></a></li>
                    <?php } ?>
                </ul>
            </div>
            
            <div class="gallery-right"><img src="<?php bloginfo('template_directory') ?>/images/gallery-arrow-right.png" alt="arrow-right1"></div>
        </div>
    </div>
	<script>
    jQuery(function($) {
		
        $('.next').click(function(e) {
			e.preventDefault();
            $('.jcarousel2').jcarousel('scroll', '+=1');
			index = $('.jcarousel2').jcarousel('visible').index();
			$imgSrc =$('.jcarousel2 li:eq('+index+')').find('a').attr('href');
			move($imgSrc);
        });
		
        $('.prev').click(function(e) {
			e.preventDefault();
            $('.jcarousel2').jcarousel('scroll', '-=1');
			index = $('.jcarousel2').jcarousel('visible').index();
			$imgSrc =$('.jcarousel2 li:eq('+index+')').find('a').attr('href');
			move($imgSrc);
        });
		
        $('.jcarousel2').jcarousel({wrap: 'circular'});
        $('.gallery-right').click(function() {
            $('.jcarousel2').jcarousel('scroll', '+=1');
        });
        $('.gallery-left').click(function() {
            $('.jcarousel2').jcarousel('scroll', '-=1');
        });	
        
        $(".jcarousel2 ul li a").click(function(e) {
            e.preventDefault();
			$imgSrc = $(this).attr('href');
			
			//$("img#large-image").fadeOut('slow', function(){});
			//$("img#large-image").attr('src',$(this).attr('href'));
			//$("img#large-image").load( function(){$(this).fadeIn('slow');});
			
			/*$("img#large-image").animate({opacity: 0.0},'fast',function(){
				$("img#large-image").attr('src',$imgSrc);
				$("img#large-image").load( function(){
					$(this).css({opacity: 0.0}).animate({opacity: 1.0},'fast');
				});
			});*/
			
			/*$("#large-image").fadeTo( "fast", 0.0, function(){
				$("#large-image").attr('src',$imgSrc);
				$("#large-image").load( function(){
					$(this).fadeTo( "fast", 1.0, function(){
						$("#large-image").clearQueue();	
					});
				});
			});*/
			move($imgSrc);
        });
    });
	
	function move($imgSrc) {
		jQuery("#large-image").fadeTo( "fast", 0.0, function(){
			jQuery("#large-image").attr('src',$imgSrc);
			jQuery("#large-image").load( function(){
				jQuery(this).fadeTo( "fast", 1.0, function(){
					jQuery("#large-image").clearQueue();	
				});
			});
		});
	}
	
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
