<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ryse
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( ryse_global_var( '404_error_style', '', false ) ) { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-<?php echo esc_attr( ryse_global_var( '404_error_style', '', false ) ); ?>">
				<?php if ( 'one' === ryse_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE ONE CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<!-- radiantthemes-counterup -->
									<!--<div class="radiantthemes-counterup odometer" data-counterup-value="<?php //echo esc_attr__( '404', 'ryse' ); ?>"></div>-->
									<!-- radiantthemes-counterup -->
									<?php echo wp_kses_post( ryse_global_var( '404_error_one_content', '', false ) ); ?>
									<?php if ( ryse_global_var( '404_error_one_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( ryse_global_var( '404_error_one_button_link', '', false ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html( ryse_global_var( '404_error_one_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE ONE CONTENT -->
				
				
				
				<?php endif; ?>
			</div>
			<!-- wraper_error_main -->

		<?php } else { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-one">
				<!-- START OF 404 STYLE ONE CONTENT -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- error_main -->
							<div class="error_main">
								<!-- radiantthemes-counterup -->
								<div class="radiantthemes-counterup odometer" data-counterup-value="<?php echo esc_attr__( '404', 'ryse' ); ?>"></div>
								<!-- radiantthemes-counterup -->
								<h1><?php echo esc_html__( 'Opps! Page is not available', 'ryse' ); ?></h1>
								<h2><?php echo esc_html__( 'We\'re not being able to find the page you\'re looking for', 'ryse' ); ?></h2>
								<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html__( 'Back To Home', 'ryse' ); ?></a>
							</div>
							<!-- error_main -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
			</div>
			<!-- wraper_error_main -->

		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
