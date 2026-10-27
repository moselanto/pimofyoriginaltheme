<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$radiantthemes_my_theme = wp_get_theme();
if ( $radiantthemes_my_theme->parent_theme ) {
	$radiantthemes_my_theme = wp_get_theme( basename( get_template_directory() ) );
}
?>

<div class="wrap about-wrap rt-admin-wrap">
<div class="wp-badge"><?php printf( esc_html__( 'Version %s', 'ryse' ), esc_html( $radiantthemes_my_theme->Version ) ); ?></div>
	<h1><?php echo esc_html__( 'Welcome to ', 'ryse' ) . $radiantthemes_my_theme->Name; ?></h1>
	<div class="about-text"><?php echo esc_html( $radiantthemes_my_theme->Name ) . esc_html__( ' is now installed and ready to use!', 'ryse' ); ?></div>
	

	<h2 class="nav-tab-wrapper wp-clearfix">
		<a class="nav-tab nav-tab-active" href="<?php echo esc_url( self_admin_url( 'themes.php?page=radiantthemes-dashboard' ) ); ?>"><?php esc_html_e( 'Dashboard', 'ryse' ); ?></a>
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'themes.php?page=radiantthemes-admin-plugins' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'ryse' ); ?></a>
		<?php if ( defined( 'FW' ) ) { ?>
			<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'tools.php?page=fw-backups-demo-content' ) ); ?>"><?php esc_html_e( 'Demo Importer', 'ryse' ); ?></a>
		<?php } ?>
		<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
			<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=_options' ) ); ?>"><?php esc_html_e( 'Theme Options', 'ryse' ); ?></a>
		<?php } ?>
	</h2>

	<?php

	$radiantthemes_theme              = wp_get_theme();
	$theme_version                    = $radiantthemes_theme->get( 'Version' );
	$theme_name                       = $radiantthemes_theme->get( 'Name' );
	$mem_limit                        = ini_get( 'memory_limit' );
	$mem_limit_byte                   = wp_convert_hr_to_bytes( $mem_limit );
	$upload_max_filesize              = ini_get( 'upload_max_filesize' );
	$upload_max_filesize_byte         = wp_convert_hr_to_bytes( $upload_max_filesize );
	$post_max_size                    = ini_get( 'post_max_size' );
	$post_max_size_byte               = wp_convert_hr_to_bytes( $post_max_size );
	$mem_limit_byte_boolean           = ( $mem_limit_byte < 268435456 );
	$upload_max_filesize_byte_boolean = ( $upload_max_filesize_byte < 67108864 );
	$post_max_size_byte_boolean       = ( $post_max_size_byte < 67108864 );
	$execution_time                   = ini_get( 'max_execution_time' );
	$execution_time_boolean           = ( $execution_time < 300 );
	$input_vars                       = ini_get( 'max_input_vars' );
	$input_vars_boolean               = ( $input_vars < 2000 );
	$input_time                       = ini_get( 'max_input_time' );
	$input_time_boolean               = ( $input_time < 1000 );
	$theme_option_address             = admin_url( 'themes.php?page=radiantthemes_theme_options' );

	?>

	<div id="radiantthemes-dashboard" class="wrap about-wrap">

		<div class="welcome-content w-clearfix">
			<!-- radiantthemes-activator -->
			<div class="radiantthemes-activator">
				<!-- radiantthemes-activator-main -->
				<div class="radiantthemes-activator-main radiantthemes-content">
					<?php
						$purchase_code       = get_option( 'radiant_purchasecode', '' );
						$buyer_email          = get_option( 'radiant_user_envato_email','' );
						$buyer_name          = get_option( 'radiant_user_name', '' );
						$purchase_validation = get_option( 'radiant_purchasecode_validation', '' );
						$readonly            = ( $purchase_validation == 'success' ) ? ' readonly' : '';
						$purchase_form_class = $purchase_validation ? 'class="' . esc_attr( $purchase_validation ) . '"' : '';
					if ( 'success' == $purchase_validation ) {
						$updated_purchase_code = str_repeat( '*', strlen( $purchase_code ) - 5 ) . substr( $purchase_code, -5 );
						$updated_buyer_name    = str_repeat( '*', 3 ) . substr( $buyer_name, 3 );
						$updated_buyer_email    = str_repeat( '*', 3 ) . substr( $buyer_email, 3 );
					} else {
						$updated_purchase_code = $purchase_code;
						$updated_buyer_name    = $buyer_name;
						$updated_buyer_email    = $buyer_email;
					}
					?>
					
				<div class="rt-registerbox">
					<h3>Register Ryse</h3>
					<?php if ( ! ( $purchase_validation == 'success' ) ) { ?>
						<p class="register-theme">Please register the Theme to get access to pre-built designs.</p>
					<?php } ?>
					<div class="radiantthemes-resgiter-form">
						<div class="radiantthemes-resgiter-form-row">
							<form class="<?php echo esc_attr( $purchase_form_class ); ?>" id="rtgetpurchasecode" method="post" action="#">
								<input id="rtPurchaseCode" name="radiant_purchase" type="text" required placeholder="Paste your purchase code here" value="<?php echo esc_attr( $updated_purchase_code ); ?>"<?php echo esc_attr( $readonly ); ?>>
								
								<input id="rtUserEmail" name="radiant_user_email" type="email" required placeholder="Your Envato User Email" value="<?php echo esc_attr( $updated_buyer_email ); ?>"<?php echo esc_attr( $readonly ); ?>>
								<input id="rtUserName" name="radiant_user_name" type="text" required placeholder="Your Envato Username" value="<?php echo esc_attr( $updated_buyer_name ); ?>"<?php echo esc_attr( $readonly ); ?>>
								<?php if ( ! ( $purchase_validation == 'success' ) ) { ?>
									<button class="btn default" type="submit"><span class="dashicons dashicons-unlock"></span> Register Theme</button>
								<?php } else { ?>
									<div class="btn success" type="submit"><span class="dashicons dashicons-yes"></span> Registered</div>
								<?php } ?>
								<div class="btn success" type="submit" style="display: none;"><span class="dashicons dashicons-yes"></span> Registered</div>
												<?php if ( ! ( $purchase_validation == 'success' ) ) { ?>
									<div class="radiantthemes-notice radiantthemes-notice-error registration-failed" style="display: none;">
										<svg width="60" height="51" viewBox="0 0 60 51" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="60" height="51" rx="2" fill="#F10000"/>
<circle cx="28.5" cy="25.5" r="11.5" fill="white"/>
<path d="M29.1524 25.8834L32.3117 22.7314C32.4501 22.5931 32.5278 22.4054 32.5278 22.2098C32.5278 22.0141 32.4501 21.8265 32.3117 21.6881C32.1734 21.5498 31.9857 21.4721 31.7901 21.4721C31.5944 21.4721 31.4068 21.5498 31.2684 21.6881L28.1164 24.8474L24.9645 21.6881C24.8261 21.5498 24.6385 21.4721 24.4428 21.4721C24.2472 21.4721 24.0595 21.5498 23.9212 21.6881C23.7828 21.8265 23.7051 22.0141 23.7051 22.2098C23.7051 22.4054 23.7828 22.5931 23.9212 22.7314L27.0805 25.8834L23.9212 29.0354C23.8523 29.1037 23.7977 29.1849 23.7604 29.2745C23.7231 29.364 23.7038 29.46 23.7038 29.557C23.7038 29.654 23.7231 29.75 23.7604 29.8396C23.7977 29.9291 23.8523 30.0104 23.9212 30.0787C23.9895 30.1475 24.0707 30.2022 24.1603 30.2395C24.2498 30.2768 24.3458 30.296 24.4428 30.296C24.5398 30.296 24.6359 30.2768 24.7254 30.2395C24.8149 30.2022 24.8962 30.1475 24.9645 30.0787L28.1164 26.9194L31.2684 30.0787C31.3367 30.1475 31.418 30.2022 31.5075 30.2395C31.597 30.2768 31.6931 30.296 31.7901 30.296C31.887 30.296 31.9831 30.2768 32.0726 30.2395C32.1621 30.2022 32.2434 30.1475 32.3117 30.0787C32.3806 30.0104 32.4352 29.9291 32.4725 29.8396C32.5098 29.75 32.529 29.654 32.529 29.557C32.529 29.46 32.5098 29.364 32.4725 29.2745C32.4352 29.1849 32.3806 29.1037 32.3117 29.0354L29.1524 25.8834Z" fill="#F10000"/>
</svg>

										<p>Oops! Invalid data has been entered. Please provide correct information to get access to pre-built designs.</p></div>
								<?php } ?>
								<div class="radiantthemes-error radiantthemes-notice-error registration-failed" style="display: none;">
									<svg width="60" height="51" viewBox="0 0 60 51" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="60" height="51" rx="2" fill="#FFC165"/>
<circle cx="29.5" cy="25.5" r="11.5" fill="white"/>
<path d="M26.5005 29.6389C25.9282 29.1235 25.5154 28.5056 25.2449 27.8422C24.5273 26.0826 24.8633 23.9898 26.2642 22.5462L27.5569 23.8389C27.6281 23.9101 27.7562 23.8588 27.7733 23.7535L28.4794 19.1323C28.4908 19.0554 28.4253 18.9899 28.3484 19.0013L23.7244 19.7074C23.619 19.7245 23.5678 19.8526 23.639 19.9238L24.9345 21.2194C22.7962 23.4061 22.4317 26.6862 23.8354 29.2488C24.2568 30.0204 24.8405 30.7265 25.5837 31.3188C26.8479 32.3239 28.4025 32.8051 29.9458 32.7738L30.2362 30.8746C28.9065 30.9885 27.5398 30.5785 26.5005 29.6389Z" fill="#FFC165"/>
<path d="M35.0996 30.7804C37.2379 28.5937 37.6024 25.3135 36.1987 22.751C35.7772 21.9793 35.1935 21.2732 34.4504 20.681C33.1862 19.6759 31.6316 19.1947 30.0883 19.226L29.7979 21.1251C31.1247 21.0113 32.4943 21.4213 33.5336 22.3609C34.1059 22.8762 34.5187 23.4941 34.7892 24.1575C35.5068 25.9172 35.1708 28.01 33.7699 29.4535L32.4772 28.1609C32.406 28.0897 32.2779 28.1409 32.2608 28.2463L31.5547 32.8675C31.5433 32.9444 31.6088 33.0098 31.6857 32.9985L36.3097 32.2923C36.415 32.2752 36.4635 32.1471 36.3951 32.0759L35.0996 30.7804Z" fill="#FFC165"/>
</svg>

									<p>The Purchase Code Is Already Being Used On Another Domain.</p></div>

                
							</form>
						</div>
					</div>
                </div>

            
                <div class="rt-purchasebox">
					<h4>Where Can I Find My Purchase Code?</h4>
					<ul>
						<li>Please go to <a href="<?php echo esc_url( 'https://themeforest.net/downloads' ); ?>" target="_blank">http://themeforest.net/downloads</a></li>
						<li>Click the Download button in "Ryse" row.</li>
						<li>Select License Certificate &amp; Purchase code.</li>
						<li>Select &amp; copy Item Purchase Code.</li>
					</ul>
				</div>

				<div class="radiantthemes-notice radiantthemes-notice-success registration-success" style="display: none;">
					<svg width="60" height="51" viewBox="0 0 60 51" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="60" height="51" rx="2" fill="#6ED597"/>
<circle cx="29.5" cy="25.5" r="11.5" fill="white"/>
<path d="M36.3403 23.3478L29.0904 30.5973C28.5535 31.1342 27.6826 31.1342 27.1453 30.5973L23.4028 26.8545C22.8657 26.3176 22.8657 25.4466 23.4028 24.9095C23.94 24.3723 24.8108 24.3723 25.3477 24.9093L28.1181 27.6797L34.3951 21.4027C34.9323 20.8656 35.8032 20.866 36.3401 21.4027C36.8771 21.9398 36.8771 22.8105 36.3403 23.3478Z" fill="#6ED497"/>
</svg>

									<p>Thank You for registering Ryse. <a href="<?php echo esc_url( self_admin_url( 'themes.php?page=radiantthemes-admin-plugins' ) ); ?>">Click here to continue with Plugin install process.</a></p>
			</div>
		<div class="radiantthemes-notice"> 
				<h4><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.5 0C7.62108 0 5.78435 0.557165 4.22209 1.60104C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175C9.48946 19.184 11.3996 18.9959 13.1355 18.2769C14.8714 17.5578 16.3551 16.3402 17.399 14.7779C18.4428 13.2156 19 11.3789 19 9.5C18.9972 6.98132 17.9953 4.56661 16.2144 2.78563C14.4334 1.00466 12.0187 0.00285071 9.5 0ZM9.31736 4.38465C9.53416 4.38465 9.74609 4.44894 9.92635 4.56938C10.1066 4.68983 10.2471 4.86103 10.3301 5.06132C10.413 5.26162 10.4347 5.48202 10.3925 5.69465C10.3502 5.90728 10.2458 6.1026 10.0925 6.2559C9.93916 6.4092 9.74384 6.5136 9.53121 6.55589C9.31857 6.59819 9.09818 6.57648 8.89788 6.49352C8.69758 6.41055 8.52639 6.27005 8.40594 6.08979C8.28549 5.90953 8.22121 5.6976 8.22121 5.4808C8.22121 5.19008 8.33669 4.91127 8.54226 4.7057C8.74783 4.50014 9.02664 4.38465 9.31736 4.38465ZM10.2308 14.6154H9.50001C9.3062 14.6154 9.12033 14.5384 8.98329 14.4013C8.84624 14.2643 8.76925 14.0784 8.76924 13.8846V9.5C8.57543 9.5 8.38955 9.42301 8.25251 9.28596C8.11546 9.14892 8.03847 8.96304 8.03847 8.76923C8.03847 8.57542 8.11546 8.38954 8.25251 8.2525C8.38955 8.11545 8.57543 8.03846 8.76924 8.03846H9.50001C9.69382 8.03847 9.87968 8.11546 10.0167 8.25251C10.1538 8.38955 10.2308 8.57542 10.2308 8.76923V13.1538C10.4246 13.1538 10.6105 13.2308 10.7475 13.3679C10.8846 13.5049 10.9615 13.6908 10.9615 13.8846C10.9615 14.0784 10.8846 14.2643 10.7475 14.4013C10.6105 14.5384 10.4246 14.6154 10.2308 14.6154Z" fill="#25B55E"/>
</svg>		
<p>Alternatively you can go to <a href="<?php echo esc_url( 'https://themeforest.net/item/ryse-seo-digital-marketing-theme/24085168/support' ); ?>" target="_blank">Ryse Support Page</a> (logged in to your ThemeForest Account ) and scroll down to the bottom of the page to find the purchase code.</p></div>
				</div>
					
				</div>
			</div>
			<!-- radiantthemes-activator -->
		
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-5">
					<div class="w-row">
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Documentation', 'ryse' ); ?>

								</div>
								<div class="w-box-content">
									<div class="theme-doc-img">
										<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/inc/radiantthemes-dashboard/images/docs.jpg" alt="<?php echo esc_html__( 'Theme Documentation', 'ryse' ); ?>" >
									</div>
									<div class="w-button rt-docs-button">
										<a href="https://radiantthemes.zendesk.com/hc/en-us/articles/360042152133-Theme-Installation-tutorial-for-Ryse" target="_blank"><?php esc_html_e( 'DOCUMENTATION', 'ryse' ); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Theme Support', 'ryse' ); ?>
								</div>
								<div class="w-box-content">
									<div class="theme-ticket-img">
										<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/inc/radiantthemes-dashboard/images/ticket.jpg" alt="<?php echo esc_html__( 'Theme Support', 'ryse' ); ?>" >
									</div>
									<div class="w-button rt-docs-button">
										<a href="https://radiantthemes.zendesk.com/hc/en-us/requests/new/" target="_blank"><?php esc_html_e( 'SUPPORT TICKET', 'ryse' ); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="w-col-sm-7">
					<div class="w-box theme-status">
						<div class="w-col-sm-4 docs-img">
							<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/inc/radiantthemes-dashboard/images/system-status.png" alt="<?php echo esc_html__( 'System Status', 'ryse' ); ?>" >
						</div>
                    <div class="w-col-sm-8 docs-content">
						<div class="w-box-head">
							<?php esc_html_e( 'System Status', 'ryse' ); ?>
						</div>
						<div class="w-box-content">
							<div class="w-system-info">
								<span> <?php esc_html_e( 'WP Memory Limit', 'ryse' ); ?> </span>
								<?php
								$wp_memory_limit       = WP_MEMORY_LIMIT;
								$wp_memory_limit_value = preg_replace( '/[^0-9]/', '', $wp_memory_limit );
								if ( $wp_memory_limit_value < 256 ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $wp_memory_limit; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:256M)', 'ryse' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $wp_memory_limit; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Upload Max. Filesize', 'ryse' ); ?> </span>
								<?php
								if ( $upload_max_filesize_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $upload_max_filesize; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'ryse' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $upload_max_filesize; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Post Size', 'ryse' ); ?> </span>
								<?php
								if ( $post_max_size_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $post_max_size; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'ryse' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $post_max_size; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Execution Time', 'ryse' ); ?> </span>
								<?php
								if ( $execution_time_boolean ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i>
									<span class="w-current"> <?php echo esc_html( 'Currently:', 'ryse' ) . ' ' . $execution_time; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:300)', 'ryse' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $execution_time; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Vars', 'ryse' ); ?> </span>
								<?php
								if ( $input_vars_boolean ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i>
									<span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $input_vars; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:2000)', 'ryse' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $input_vars; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Time', 'ryse' ); ?> </span>
								<?php
								if ( $input_time_boolean ) {
									?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $input_time; ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:1000)', 'ryse' ); ?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'ryse' ) . ' ' . $input_time; ?> </span>
								<?php } ?>
							</div>
						</div>
					</div>	

					</div>

				</div>
			</div>
		</div>
		<div class="radiantthemes-notice-important">
						<p><strong>Important Notice!</strong> Only one standard license is considered valid for one website. Running more than 1 website on a single license is a gross infringement or violation of license.</p>
					</div>
	</div>

</div> <!-- end wrap -->