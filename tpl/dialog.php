<?php
$user = wp_get_current_user();
?>

<div id="siteorigin-learn" style="display: none;">

	<div id="siteorigin-learn-overlay"></div>
	<div id="siteorigin-learn-dialog">

		<div class="poster-wrapper">
			<img src="" width="640px" height="360px" class="main-poster" />
			<img src="<?php echo plugin_dir_url( __FILE__ ) . '../img/play.svg' ?>" width="48px" height="48px" class="play-button" />
		</div>
		<div class="video-iframe">
		</div>

		<h3 class="learn-title"></h3>
		<p class="learn-description"></p>

		<form class="signup-form" method="post" action="<?php echo esc_url( SiteOrigin_Learn_Dialog::SUBMIT_URL ) ?>" target="_blank" >
			<div class="form-field">
				<input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name', 'siteorigin-panels' ) ?>" value="<?php echo ! empty( $user->data->display_name ) ? esc_attr( $user->data->display_name ) : '' ?>" />
			</div>
			<div class="form-field">
				<input type="text" name="email" placeholder="<?php esc_attr_e( 'Your Name', 'siteorigin-panels' ) ?>" value="<?php echo ! empty( $user->data->user_email ) ? esc_attr( $user->data->user_email ) : '' ?>"  />
			</div>
			<div class="form-submit">
				<input type="submit" class="button-primary" />
			</div>
		</form>
		<div class="form-description"></div>

		<div class="learn-close"><?php _e( 'Close', 'siteorigin-panels' ) ?></div>

	</div>

</div>
