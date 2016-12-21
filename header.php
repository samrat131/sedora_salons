<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sedora
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php /*?><link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php */?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header-full" class="sticky desktop">
<div class="wrap-head">
	<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><img itemprop="logo" src="<?php echo get_opt('header_logo') ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div>
    <aside id="navigation">
	    <div class="tel"><img src="<?php bloginfo('template_directory') ?>/images/tel-icon.png" alt="tel" class="align"> &nbsp;<?php echo get_opt('phone') ?></div>
        <?php wp_nav_menu( array( 'menu' =>'TopMenu','container'=>'nav', 'container_class'=>'','container_id'=>'', 'menu_class'=>'' ) ); ?>
    </aside>
</div>
</div>

<div id="header-full">
<div class="wrap-head">
	<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><img itemprop="logo" src="<?php echo get_opt('header_logo') ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div>
    <div class="tel"><img src="<?php bloginfo('template_directory') ?>/images/tel-icon.png" alt="tel" class="align"> &nbsp;<?php echo get_opt('phone') ?></div>
    <aside id="navigation">
        <div class="btn" onClick="display();">Menu</div>
        <?php wp_nav_menu( array( 'menu' =>'TopMenu','container'=>'nav', 'container_class'=>'','container_id'=>'myslidemenu', 'menu_class'=>'' ) ); ?>
    </aside>
</div>
</div>
