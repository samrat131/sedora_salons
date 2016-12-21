<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sedora
 */

$prefix2 = '_ss_directory_';
get_header(); ?>

<div id="content-block">
<div class="wrap-subcontent">
	<?php while ( have_posts() ) : the_post(); ?>
        <h2><?php echo get_pm($prefix2.'owner_first_name'); ?></h2>
        <div class="sabine-block">
            <div class="sabine-field" itemscope itemtype="http://schema.org/Organization">
                <div class="sabine-pic" itemprop="Founder"  itemscope itemtype="http://schema.org/Person">
                    <div><?php if (has_post_thumbnail()) { the_post_thumbnail('full'); } ?></div>
                    <div class="sabine-name prepand2" itemprop="name"><?php the_title(); ?></div>
                    <div class="sabine-desig" itemprop="jobTitle">Owner of <?php echo get_pm($prefix2.'salon_name'); ?></div>
                </div>
                <div class="sabine-info">
                    <div class="sabine-text2">Salon Name: </div>
                    <div class="sabine-text prepand1" itemprop="name"><?php echo get_pm($prefix2.'salon_name'); ?></div>
                    
                    <div class="sabine-text2 prepand3">Suite Number: </div>
                    <div class="sabine-text prepand1"><?php echo get_pm($prefix2.'suite_number'); ?></div>
                    
                  <div class="sabine-text2 prepand3">Telephone: </div>
                    <div class="sabine-text prepand1" itemprop="telephone"><?php echo get_pm($prefix2.'telephone'); ?></div>
                    
                  <div class="sabine-text2 prepand3">Email: </div>
                    <div class="sabine-text prepand1"><a itemprop="email" href="mailto:<?php echo get_pm($prefix2.'email'); ?>"><?php echo get_pm($prefix2.'email'); ?></a></div>
                    
                    <?php if(get_pm($prefix2.'coupon')>0) { ?><div class="prepand3"><a href="<?php echo get_permalink(get_pm($prefix2.'coupon')); ?>"><img src="<?php bloginfo('template_directory') ?>/images/money-saving.jpg" alt="Money Saving Coupons"></a></div><?php } ?>
                </div>
                
              <div class="sabine-desc">
                    <div class="sabine-text2">Online Booking & Website: </div>
                    <div class="sabine-text prepand1" itemprop="sameAs"><a href="<?php echo get_pm($prefix2.'website'); ?>"><?php echo get_pm($prefix2.'website'); ?></a></div>
                    
                    <div class="sabine-text2 prepand3">Hours of Operation:</div>
                    <div class="sabine-text prepand1" itemscope="" itemtype="http://schema.org/CivicStructure">
                    <?php echo get_pm($prefix2.'hour_operation'); ?>
					</div>
                    
                    <div class="sabine-text2 prepand3">Methods of Payment: </div>
                    <div class="sabine-text prepand1"><?php echo get_pm($prefix2.'payment_methods'); ?></div>
                    
            </div>
            
            
            <div class="our-service">
                <?php echo get_pm($prefix2.'our_services', true); ?>
            </div>
            
            <div class="sabine-field prepand2">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
