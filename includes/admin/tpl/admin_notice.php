<?php
/**
 * Admin notice template
 */
?>
<div class="notice notice-<?php echo $notice_type;?> <?php echo ( $is_dismissible  ? 'is-dismissible' : '' ); ?> inline av-ml-0 av-mt-3 av-admin-notice" 
		style="margin-left: 0px; margin-top: 40px; background-image: url( <?php echo plugins_url( 'assets/images/av_icon_16.png', AV_YT_PLUGIN_URL ); ?> ); background-image: url( <?php echo plugins_url( 'assets/images/av_icon_16.svg', AV_YT_PLUGIN_URL ); ?> ); background-position: 10px center; background-repeat: no-repeat; padding-left: 30px;">
	<p><?php echo $message; ?></p>
</div>