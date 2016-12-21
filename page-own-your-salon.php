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

<div id="slider-block" style="overflow:hidden;">
	<ul>
    	<li>
        	<div class="left-arrow-sub"><img src="<?php bloginfo('template_directory') ?>/images/arrow-left-small.png" alt=""></div>
            <div class="right-arrow-sub"><img src="<?php bloginfo('template_directory') ?>/images/arrow-right-small.png" alt=""></div>
            <div class="ownsalon-mid cycle-slideshow" data-cycle-slides="> h2" data-cycle-timeout="5000" data-cycle-prev=".left-arrow-sub" data-cycle-next=".right-arrow-sub">
            <?php $captions = get_pm('_own_salon_header_caption'); 
			//print_r($captions);
			foreach($captions as $caption) { 
			 echo '<h2>'.$caption['image_caption'].'</h2>';
			}
			?>
            </div>
        	<img src="<?php echo get_pm('_own_salon_header_image'); ?>" width="100%" alt="sedora-header-bg">
        </li>   
	</ul>
</div>

<div id="ownsalon-block">
<div class="wrap-subcontent">
	<div class="ownsalon-part right-img " align="center"><?php echo get_img('_own_salon_image_1'); ?></div>
	<div class="ownsalon-part">
    	<div class="ownright">
            <?php echo get_pm('_own_salon_section_1', true); ?>
        </div>       
    </div>
</div>
</div>

<div id="ownsalon-block">
<div class="wrap-subcontent">
    <div class="ownsalon-part" align="center"><?php echo get_img('_own_salon_image_2'); ?></div>
    <div class="ownsalon-part">
   	  <div class="ownleft">
          <?php echo get_pm('_own_salon_section_2', true); ?>
      </div>
    </div>
</div>
</div>

<div id="content-block">
<div class="wrap-subcontent ownblock">
	<h2>Industry Leading Amenities</h2>
    <div class="buildind-aminets-left">
    	<h3>Building Amenities</h3>
    	<ul class="aminets">
          <li>Upscale exterior facade</li>
            <li>Attractive outdoor signage with customizable advertising messages</li>
            <li>Ample parking for you and your clients</li>
            <li>Parking lot lighting for your safety</li>
            <li>24 hour keyless access system</li>
            <li>Comfortable waiting area</li>
            <li>Outdoor open-air courtyard with fountain and comfortable seating</li>
            <li>Complimentary gourmet coffee and tea</li>
            <li>Innovative building design that allows your clients to reach your 
suite quickly and easily (no mazes!)</li>
            <li>4 restrooms/changing rooms</li>
            <li>Fully equipped break room with refrigerator, microwave 
and dish washer</li>
            <li>Laundry room with washers and dryers</li>
            <li>Interior directory and signage</li>
            <li>Vending machines</li>
        </ul>
    </div>
    
    <div class="buildind-aminets-right">
    	<h3>Suite Amenities</h3>
    	<ul class="aminets">
            <li>Beautiful flooring</li>
            <li>Outdoor window and hallway window in every suite</li>
            <li>In-suite music system with your personal volume control and station 
selector. Choose from 4 different commercial‐free music programs</li>
            <li>Central vacuum system for quick and easy clean‐up</li>
            <li>Color correcting lighting</li>
            <li>Hydraulic styling chair</li>
            <li>Marble-composite shampoo bowl. Extra wide inside front guarantees 
plenty of extra room for easy hand movement in and around the bowl</li>
            <li>Shampoo chair</li>
            <li>Elegant wood framed styling mirror</li>
            <li>Wall station with drawer and holes for tools</li>
            <li>Mobile styling station with drawer and cabinet space</li>
            <li>Seated hair dryer</li>
            <li>Gas, water, and electric utilities included</li>
            <li>Phone ready</li>
            <li>Free WiFi</li>
            <li>Signage with the name of your salon</li>
            <li>Free webpage on our website to provide your customers with 
information on your salon</li>
        </ul>
    </div>
</div>
</div>

<div id="green-bar">
	<h2>"The Most Comprehensive Move In Package Available In  <br>Houston—guaranteed!" </h2>
</div>

<div id="content-block">
<div class="wrap-subcontent">
    <div class="freerent-left">
	    <?php echo get_pm('_own_salon_section_4', true); ?>
    </div>
    
    <div class="freerent-right">
    	<?php echo get_img('_own_salon_image_4', true); ?>
    </div>
</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
