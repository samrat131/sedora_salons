<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sedora
 */

?>

<div id="footer-block">
<div class="wrap-footer">
	<div class="prepand4" align="center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><img src="<?php echo get_opt('footer_logo') ?>" alt="logo"></a></div>
	<div id="map" class="footer-left" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    	<?php echo get_opt('contact_info') ?>
        <div class="call">Call <br><span itemprop="telephone"><?php echo get_opt('phone') ?></span></div>
        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.0834565909972!2d-95.58408899999999!3d29.948278000000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640d18a9ee87261%3A0x66a9d90dbdf6aff3!2sSedora+Salons!5e0!3m2!1sen!2sbd!4v1439913107044" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </div>
    <div class="download-box">
    	<h2 style="margin-top:0;">thinking of moving to your own salon?</h2>
        <div class="book"><img src="<?php bloginfo('template_directory') ?>/images/optin.png" alt=""></div>
        <div class="download-mid">
            <p>Download Your FREE Copy Of:</p>
            <p class="prepand1">"6 Ways To Guarantee That Your Clients 
            Never Leave You And Will Follow You 
            When You Move"</p>
            <p class="prepand1">Plus our exclusive 45-Point Salon Suite
            Comparison Checklist, which includes a list
            of ALL the features you need to be successful!</p>
            <!--<p>You MUST read our Free 45‐point Comparison
    Checklist BEFORE you lease a Salon Suite. 
    Includes a list of ALL the features you need 
    to be successful.</p>
			<p class="prepand2">Don't lease a salon suite without it!</p>-->
        </div>
        
        <form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl" target="_new" >
          <div style="display: none;">
            <input type="hidden" name="meta_web_form_id" value="1857453587" />
            <input type="hidden" name="meta_split_id" value="" />
            <input type="hidden" name="listname" value="awlist3509106" />
            <input type="hidden" name="redirect" value="http://sedorasalons.com/thx/" id="redirect_712b32d7862993e895a9f065050936c2" />
            <input type="hidden" name="meta_adtracking" value="Name_and_email" />
            <input type="hidden" name="meta_message" value="1" />
            <input type="hidden" name="meta_required" value="email" />
            <input type="hidden" name="meta_tooltip" value="" />
          </div>
          <div class="download-field">
            <input class="text" id="awf_field-67498183" type="email" name="email" value="" tabindex="500" placeholder="your email" required="required" />
          </div>
          <div class="download-field">
            <div class="download-now"><input name="submit" id="af-submit-image-1857453587" type="submit" class="" style=" padding:0; background: none; cursor:pointer;" alt="Submit Form" tabindex="501" value="GET MY FREE REPORT >>" /></div>
          </div>
          <div style="display: none;"><img src="https://forms.aweber.com/form/displays.htm?id=jBys7CyszKwc7A==" alt="" /></div>
        </form>
    </div>
    
    <div class="copy-block">
    	<div align="center"><img src="<?php bloginfo('template_directory') ?>/images/line.jpg" alt=""></div>
        <div align="center" class="footer-menu">
          <?php wp_nav_menu( array( 'menu' =>'TopMenu','container'=>'', 'container_class'=>'','container_id'=>'', 'menu_class'=>'' ) ); ?>        
        </div>
        <div class="copy-text"><?php echo get_opt('copy_right_text'); ?></div>
    </div>
</div>
</div>
<?php /*?><div class="toplink"><a href="#header-full"><img src="<?php bloginfo('template_directory') ?>/images/top-arrow.png" alt="top"></a></div><?php */?>

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function(){ 
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 120) {
			jQuery('.sticky').fadeIn('fast');
		} else {
			jQuery('.sticky').fadeOut('fast');
		}			
	}); 
});
</script>

</body>
</html>
