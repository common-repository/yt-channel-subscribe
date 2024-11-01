<div class="av-container" id="av-container">

	<?php if( ( $active_count = count( $av_plugins ) ) > 0 ) { ?>
	<div class="av-title-logo">
		<div class="av-fs-180"><?php _e( 'Active plugins', 'av-subscribe' );?></div>
		<p><?php _e( 'List of active AV Plugins on your site. Click on the plugin to go to the settings page.', 'av-subscribe' );?></p>
	</div>

	<div class="av-row av-clearfix">

		<?php $apc = 1; foreach( $av_plugins as $plgn ) { ?>

		<div class="av-col-3 av-mt-2 <?php echo $apc == 1 ? 'av-col-first' : '' ;?> <?php echo $apc == $active_count ? 'av-col-last' : '' ;?> av-plugin-container">
			<div class="av-card av-p-1">
				<div class="av-mb-1">
					<a href="<?php echo admin_url( 'admin.php?page=' . AV_YT_PLUGIN_SETTING_PAGE );?>"><img src="<?php echo plugins_url( '/assets/images/cover.png', AV_YT_PLUGIN_URL ); ?>" alt="<?php echo $plgn['Name']; ?>" class="av-img-fluid" /></a>
				</div>
				<a href="<?php echo admin_url( 'admin.php?page=' . AV_YT_PLUGIN_SETTING_PAGE );?>" class="av-no-underline av-text-bold"><span class="dashicons dashicons-admin-generic"></span> <?php echo $plgn['Name']; ?></a>
				<p class="av-main-descr"><?php echo $plgn['Description'];?></p>
			</div>
		</div>

		<?php $apc++; } ?>
	</div>
	<?php } ?>

</div>