<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TJ_Recipe
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php $GLOBALS[ 'var' ] = 2; ?>
<body <?php hybrid_attr( 'body' ); ?>>
	<!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

		<!-- ****** Top Header Area Start ****** -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <!--  Top Social bar start -->
                    <?php tj_recipe_header_social(); ?>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!--  Logo start -->
										<?php tj_recipe_site_branding(); ?>
                </div>

								<div class="col-12 col-md-6 col-lg-4">
										<!--  Header Search Area -->
								 		<?php header_search(); ?>
							 	</div>

            </div>
        </div>
    </div>
    <!-- ****** Header End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">


            <div class="row">
                <div class="col-12" id="top">
                    <nav class="navbar navbar-expand-lg" role="navigation" <?php hybrid_attr( 'menu' ); ?>>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center">
													<?php wp_nav_menu( array(
															'theme_location' => 'primary',
															'container'         => '',
															'menu_id'	=> 'primary-menu',
															'fallback_cb'       => '',
															'menu_class' => 'sf-menu left',
															));
												?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->
