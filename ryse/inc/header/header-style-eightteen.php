<?php
/**
 * Header Style Eightteen Template
 *
 * @package ryse
 */

?>

<!-- wraper_header -->
<header class="wraper_header style-eightteen">
	<!-- wraper_header_top -->
    <div class="wraper_header_top visible-lg visible-md visible-sm hidden-xs">
		<div class="container">
			<!-- header_top -->
	<div class="row header_top">
    <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12 text-left">
        <!-- header_top_item -->
        <div class="header_top_item">
            <!-- header-top-note -->
            <ul class="header-contact">
				<?php if ( ! empty( ryse_global_var( 'header_eightteen_top_note', '', false ) ) ) : ?>
                <li class="phone"> <?php echo wp_kses_post( ryse_global_var( 'header_eightteen_top_note', '', false ) ); ?></li>
				<?php endif; ?>
               
            </ul>
            <!-- header-contact -->
        </div>
        <!-- header_top_item -->
    </div>
	
	<div class="col-lg-6 col-md-3 col-sm-3 col-xs-12 text-right">
		<!-- header_top_item -->
        <div class="header_top_item">
            <!-- header-contact -->
            <ul class="header-contact">
			  
				<?php if ( ! empty( ryse_global_var( 'header_eightteen_header_email', '', false ) ) ) : ?>
                <li class="email"> <img src="<?php echo esc_url( ryse_global_var( 'header_eightteen_image2', 'url', true ) ); ?>" alt="<?php echo esc_attr( ryse_global_var( 'header_eightteen_image2', 'alt', true ) ); ?>"><?php echo wp_kses_post( ryse_global_var( 'header_eightteen_header_email', '', false ) ); ?></li>
				<?php endif; ?>

				<?php if ( ! empty( ryse_global_var( 'header_eightteen_header_phone_text', '', false ) ) ) : ?>
                <li class="phone"> <img src="<?php echo esc_url( ryse_global_var( 'header_eightteen_image1', 'url', true ) ); ?>" alt="<?php echo esc_attr( ryse_global_var( 'header_eightteen_image1', 'alt', true ) ); ?>"><?php echo wp_kses_post( ryse_global_var( 'header_eightteen_header_phone_text', '', false ) ); ?></li>
				<?php endif; ?>
               
            </ul>
            <!-- header-contact -->
        </div>
        <!-- header_top_item -->
        
    </div>
	
	
	
    
</div>		
			
			
			<!-- header_top -->
		</div>
	</div>
	<!-- wraper_header_top -->
	<!-- wraper_header_main -->
	<?php if ( true == ryse_global_var( 'header_eightteen_sticky', '', false ) ) { ?>
	    <div data-delay="<?php echo esc_attr( ryse_global_var( 'header_eightteen_sticky_delay', '', false ) ); ?>" class="wraper_header_main radiantthemes-sticky-style-<?php echo esc_attr( ryse_global_var( 'header_eightteen_sticky_style', '', false ) ); ?>">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<?php if ( ryse_global_var( 'header_eightteen_logo', 'url', true ) ) { ?>
					<!-- brand-logo -->
					<div class="brand-logo radiantthemes-retina">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( ryse_global_var( 'header_eightteen_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( ryse_global_var( 'header_eightteen_logo', 'alt', true ) ); ?>"></a>
					</div>
					<!-- brand-logo -->
				<?php } ?>
				<!-- header-responsive-nav -->
				<div class="header-responsive-nav hidden-lg hidden-md visible-sm visible-xs"><span class="ti-menu"></span></div>
				<!-- header-responsive-nav -->
			    <!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( true == ryse_global_var( 'header_eightteen_search_display', '', false ) ) : ?>
                            <li class="header-slideout-searchbar">
                                <div class="header-slideout-searchbar-holder">
                                    <!-- header-slideout-searchbar-icon -->
                                    <div class="header-slideout-searchbar-icon"><span class="ti-search"></span></div>
                                    <!-- header-slideout-searchbar-icon -->
                                    <!-- header-slideout-searchbar-box -->
                                    <form class="header-slideout-searchbar-box" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <div class="form-row">
        						            <input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'ryse' ); ?>" value="" name="s" required>
        						            <button type="submit"><span class="ti-search"></span></button>
        						        </div>
            						</form>
            						<!-- header-slideout-searchbar-box -->
        						</div>
                            </li>
						<?php endif; ?>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == ryse_global_var( 'header_eightteen_cart_display', '', false ) ) ) : ?>
							<li class="header-cart-bar">
								<a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
									<i class="fa fa-shopping-basket"></i>
									<span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					if ( true == ryse_global_var( 'header_eightteen_menu_singlepagemode', '', false ) ) {
    					wp_nav_menu(
                            array(
                                'theme_location' => 'top',
                                'fallback_cb'    => false,
                                'items_wrap'     => '<ul id="%1$s" class="%2$s single-page-mode">%3$s</ul>',
                                'walker'         => new Radiantthemes_Menu_Walker(),
                            )
                        );
    				} else {
    				    wp_nav_menu(
                            array(
                                'theme_location' => 'top',
                                'fallback_cb'    => false,
                                'walker'         => new Radiantthemes_Menu_Walker(),
                            )
                        );
        		    } ?>
				</nav>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<!-- mobile-menu -->
<div class="mobile-menu hidden">
	<!-- mobile-menu-main -->
	<div class="mobile-menu-main">
		<!-- mobile-menu-close -->
		<div class="mobile-menu-close">
			<span class="ti-close"></span>
		</div>
		<!-- mobile-menu-close -->
		<!-- mobile-menu-nav -->
		<nav class="mobile-menu-nav">
            <?php
            if ( true == ryse_global_var( 'header_eightteen_menu_singlepagemode', '', false ) ) {
				wp_nav_menu(
                    array(
                        'theme_location' => 'top',
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s single-page-mode">%3$s</ul>',
                        'walker'         => new Radiantthemes_Menu_Walker(),
                    )
                );
			} else {
			    wp_nav_menu(
                    array(
                        'theme_location' => 'top',
                        'fallback_cb'    => false,
                        'walker'         => new Radiantthemes_Menu_Walker(),
                    )
                );
		    } ?>
		</nav>
		<!-- mobile-menu-nav -->
	</div>
	<!-- mobile-menu-main -->
</div>
<!-- mobile-menu -->
