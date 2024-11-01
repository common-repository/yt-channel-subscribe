<?php
/**
 * Plugin options page template
 */
?>
<?php if( isset( $_GET['status'] ) && $_GET['status'] == 1 ) { ?> 
<div class="notice notice-success is-dismissible inline av-ml-0 av-mt-3">
	<p>
		<?php _e( 'Settings successfully saved.', 'av-subscribe' ); ?>
	</p>
</div>
<?php } ?>

<div class="av-container" id="av-container">

	<div class="av-title-logo">
		<div class="av-fs-180"><?php _e( 'Configure Channel Subscription Button', 'av-subscribe' );?></div>
	</div>

	<div class="av-row av-mt-2">

		<div class="av-col-8 av-col-first">
			<div class="av-card">
				<div class="av-p-2">
				
<div class="av-card-title av-text-bold av-fs-120">
	<?php _e( 'General settings', 'av-subscribe' ); ?>
</div>

<form method="post" action="admin-post.php">
	<input type="hidden" name="action" value="AV_YT_save_options" />
	<?php wp_nonce_field( 'AV_YT_save_options', 'AV_YT_options_verify' ); ?>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av_yt_channel_id"><?php _e( 'Channel ID', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<input type="text" name="AV_YT_channel_id" id="av_yt_channel_id" value="<?php echo av_set_value( 'AV_YT_channel_id', $plugin_options['channel_id'] );?>" class="av-form-control av-yt-update-widget" />
		<div class="help-text"><?php _e( 'Click here to obtain your <a href="http://www.youtube.com/account_advanced" target="_blank">YouTube Channel ID <i class="av-icon dashicons dashicons-external"></i></a>', 'av-subscribe' );?></div>
	</div>
</div>


<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av-yt-layout"><?php _e( 'Layout', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<select name="AV_YT_layout" id="av-yt-layout" class="av-form-control av-yt-update-widget">
			<option value="default" <?php echo av_set_select( 'AV_YT_layout', 'default', ( "default" == $plugin_options['layout'] ) ); ?>><?php _e( 'default', 'av-subscribe' );?></option>
			<option value="full" <?php echo av_set_select( 'AV_YT_layout', 'full', ( "full" == $plugin_options['layout'] ) ); ?>><?php _e( 'full', 'av-subscribe' );?></option>
		</select>
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av-yt-theme"><?php _e( 'Theme', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<select name="AV_YT_theme" id="av-yt-theme" class="av-form-control av-yt-update-widget">
			<option value="default" <?php echo av_set_select( 'AV_YT_theme', 'default', ( "default" == $plugin_options['theme'] )); ?>><?php _e( 'default', 'av-subscribe' );?></option>
			<option value="dark" <?php echo av_set_select( 'AV_YT_theme', 'dark', ( "dark" == $plugin_options['theme'] )); ?>><?php _e( 'dark', 'av-subscribe' );?></option>
		</select>
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av-yt-show-subscriber"><?php _e( 'Subscriber count', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<select name="AV_YT_show_subscribers_count" id="av-yt-show-subscriber" class="av-form-control av-yt-update-widget">
			<option value="default" <?php echo av_set_select( 'AV_YT_show_subscribers_count', 'default', ( "default" == $plugin_options['show_subscribers_count'] ) ); ?>><?php _e( 'default (shown)', 'av-subscribe' );?></option>
			<option value="hidden" <?php echo av_set_select( 'AV_YT_show_subscribers_count', 'hidden', ( "hidden" == $plugin_options['show_subscribers_count'] ) ); ?>><?php _e( 'hidden', 'av-subscribe' );?></option>
		</select>
	</div>
</div>

<div class="av-form-group av-row av-mt-2">
	<div class="av-col-4 av-col-first">&nbsp;</div>
	<div class="av-col-6">
		<button type="submit" class="av-btn av-btn-block av-fs-150"><?php _e( 'Save settings', 'av-subscribe' );?></button>
 	</div>
</div>


<div class="av-card-title av-text-bold av-fs-120 av-mt-5">
	<?php _e( 'Design settings', 'av-subscribe' ); ?>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av_yt_widget_text"><?php _e( 'Subscribe text', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<input type="text" name="AV_YT_widget_text" id="av_yt_widget_text" value="<?php echo av_set_value( 'AV_YT_widget_text', $plugin_options['widget_text'] );?>" class="av-form-control av-yt-update-widget" />
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av-yt-widget-alignment"><?php _e( 'Widget alignment', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<select name="AV_YT_widget_alignment" id="av-yt-widget-alignment" class="av-form-control av-yt-update-widget">
			<option value="left" <?php echo av_set_select( 'AV_YT_widget_alignment', 'left', ( "left" == $plugin_options['widget_alignment'] ) ); ?>><?php _e( 'left', 'av-subscribe' );?></option>
			<option value="center" <?php echo av_set_select( 'AV_YT_widget_alignment', 'center', ( "center" == $plugin_options['widget_alignment'] ) ); ?>><?php _e( 'center', 'av-subscribe' );?></option>
			<option value="right" <?php echo av_set_select( 'AV_YT_widget_alignment', 'right', ( "right" == $plugin_options['widget_alignment'] ) ); ?>><?php _e( 'right', 'av-subscribe' );?></option>
		</select>
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av_yt_widget_color"><?php _e( 'Widget font color', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<input type="text" name="AV_YT_widget_color" id="av_yt_widget_color" value="<?php echo av_set_value( 'AV_YT_widget_color', $plugin_options['widget_color'] );?>" class="av-form-control av_yt_color-field av-yt-update-widget" />
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av_yt_widget_bg_color"><?php _e( 'Widget background color', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<input type="text" name="AV_YT_widget_bg_color" id="av_yt_widget_bg_color" value="<?php echo av_set_value( 'AV_YT_widget_bg_color', $plugin_options['widget_bg_color'] );?>" class="av-form-control av_yt_color-field av-yt-update-widget" />
	</div>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av_yt_widget_border_color"><?php _e( 'Widget border color', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<input type="text" name="AV_YT_widget_border_color" id="av_yt_widget_border_color" value="<?php echo av_set_value( 'AV_YT_widget_border_color', $plugin_options['widget_border_color'] );?>" class="av-form-control av_yt_color-field av-yt-update-widget" />
	</div>
</div>

<div class="av-form-group av-row av-mt-2">
	<div class="av-col-4 av-col-first">&nbsp;</div>
	<div class="av-col-6">
		<button type="submit" class="av-btn av-btn-block av-fs-150"><?php _e( 'Save settings', 'av-subscribe' );?></button>
 	</div>
</div>

<div class="av-card-title av-text-bold av-fs-120 av-mt-5">
	<?php _e( 'Plugin uninstall', 'av-subscribe' ); ?>
</div>

<div class="av-form-group av-row">
	<div class="av-col-4 av-col-first">
		<label for="av-yt-show-subscriber"><?php _e( 'Delete plugin settings', 'av-subscribe' );?>:</label>
	</div>
	<div class="av-col-6">
		<label class="av-mr-2 av-label-option av-clearfix">
			<input type="checkbox" name="AV_YT_uninstall_delete_settings" value="1" <?php echo av_set_checkbox( 'AV_YT_uninstall_delete_settings', 1, ( 1 === $plugin_options['uninstall_delete_settings'] ) );?> /> <?php _e( 'Yes, delete all settings', 'av-subscribe' );?>
		</label>
		<div class="help-text mt-1"><?php _e( '<strong>Caution:</strong> this option will delete all settings and data when you uninstall the plugin.', 'av-subscribe' );?></div>
	</div>
</div>

<div class="av-form-group av-row av-mt-2">
	<div class="av-col-4 av-col-first">&nbsp;</div>
	<div class="av-col-6">
		<button type="submit" class="av-btn av-btn-block av-fs-150"><?php _e( 'Save settings', 'av-subscribe' );?></button>
 	</div>
</div>

</form>
				</div>
			</div>
		</div>

		<div class="av-col-4" id="av_yt_sidebar">

			<div class="av-fs-120 av-text-bold av-mb-2"><?php _e( 'Subscribe button preview', 'av-subscribe' );?></div>	
			
			<div class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
				<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/eGywhinDNKg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>

			<div id="av_yt_container" style="background-color: <?php echo $plugin_options['widget_bg_color'];?>; border: 1px solid <?php echo $plugin_options['widget_border_color'];?>; padding: 5px 10px 0 10px; clear: both; text-align: <?php echo $plugin_options['widget_alignment'];?>;">
				<div id="av_yt_text" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; vertical-align: top; display: inline-block; height: 24px; margin-right: 5px; padding-top: 4px; color: <?php echo $plugin_options['widget_color'];?>;">
					<?php echo $plugin_options['widget_text'];?>
				</div>
				<div id="av_yt_subcribe_btn" class="g-ytsubscribe" data-channelid="<?php echo $plugin_options['channel_id'];?>" data-layout="<?php echo $plugin_options['layout'];?>" data-theme="<?php echo $plugin_options['theme'];?>" data-count="<?php echo $plugin_options['show_subscribers_count'];?>"></div>
			</div>

			<div class="av-card av-mt-2">
				<div class="av-p-2">
					<div class="av-card-title av-text-bold av-fs-120">
						<?php _e( 'Shortcode', 'av-subscribe' ); ?>
					</div>

					<p><?php _e( 'Default behaviour (from settings)', 'av-subscribe' );?></p>
					<input type="text" class="av-form-control av-mb-1" value="[AV_Subscribe_Channel][/AV_Subscribe_Channel]" onclick="this.select();" readonly />

					<div class="av-clearfix av-mb-3">
						<?php echo do_shortcode( '[AV_Subscribe_Channel][/AV_Subscribe_Channel]' ); ?>
					</div>

					<p><?php _e( 'Override user settings', 'av-subscribe' );?></p>
					<input type="text" class="av-form-control av-mb-1" value='[AV_Subscribe_Channel channel_id="UC6MWXc4VWsS1nAVAPfkKfrg" layout="full" theme="default" subscribers="default" align="right" color="#cc0000" bgcolor="#ffffff" bordercolor="#ffffff" class="my-custom-class"]Subscribe[/AV_Subscribe_Channel]' onclick="this.select();" readonly />

					<div class="av-clearfix">
						<?php echo do_shortcode( '[AV_Subscribe_Channel channel_id="UC6MWXc4VWsS1nAVAPfkKfrg" layout="full" theme="default" subscribers="default" align="right" color="#cc0000" bgcolor="#ffffff" bordercolor="#ffffff" class="my-custom-class"]Subscribe[/AV_Subscribe_Channel]' ); ?>
					</div>

					<p><?php _e( 'Shortcode parameters (all optional)', 'av-subscribe' );?></p>
					<pre><code class="av-code">channel_id="your_channel_id"
layout="[default|full]"
theme="[default|dark]"
subscribers="[default|hidden]"
align="[left|center|right]"
color="#000000"
bgcolor="#ffcc00"
bordercolor="#ff0000"
class="my-custom-class"</code></pre>

				</div>
			</div>
			
			<div class="av-fs-120 av-text-bold av-mt-3"><?php _e( 'Your feedback', 'av-subscribe' );?></div>
			<p><?php _e( 'Our goal is to provide quality plugins and your feedback is very important to us.', 'av-subscribe' );?></p>

			<div class="av-card">
				<div class="av-p-2">
					<div id="AV_YT_feedback_success" class="av-alert av-alert-success av-hide">
						<?php echo sprintf( '<strong>%s</strong><br>%s', 
											__( 'Thank you for your feedback!', 'av-subscribe' ), 
											__( 'We appreciate it very much.', 'av-subscribe' ) ); ?> 
					</div>
					<form id="AV_YT_feedback_form" role="form">
						
						<div id="av_plugin_star_rating"></div>
						
						<input type="hidden" name="AV_YT_plugin_rating" id="AV_YT_plugin_rating" value="4.5" />
						<?php wp_nonce_field( 'AV_YT_send_feedback', 'AV_YT_rating_nonce' ); ?>
						
						<div class="av-form-group av-mt-2">
							<textarea id="AV_YT_plugin_feedback" name="AV_YT_plugin_feedback" class="av-form-control" required rows="3" placeholder="<?php esc_attr_e( 'tell us what you think..', 'av-subscribe' );?>"></textarea>
						</div>
						
						<div class="av-form-group av-row">
							<div class="av-col-6 av-col-first">
								<input type="text" name="AV_YT_rating_name" id="AV_YT_rating_name" value="" required class="av-form-control" placeholder="<?php esc_attr_e( 'Your name', 'av-subscribe' );?>" />
							</div>
							<div class="av-col-6 av-col-last">
								<input type="text" name="AV_YT_rating_email" id="AV_YT_rating_email" value="" required class="av-form-control" placeholder="<?php esc_attr_e( 'your@email.com', 'av-subscribe' );?>" />
							</div>
						</div>

						<div id="AV_YT_rating_required_fields" class="av-hide av-text-danger av-mb-1">* <?php _e( 'Required fields', 'av-subscribe' );?></div>
						
						<button type="submit" id="AV_YT_submit_feedback_btn" class="av-btn av-btn-block"><?php _e( 'Submit feedback', 'av-subscribe' );?></button>
					
					</form>
				</div>
			</div>

		</div>

	</div>

</div>