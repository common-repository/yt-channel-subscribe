<?php
/**
 * Plugin widget options form
 */
?>
<p><?php _e( 'You can change the parameters to override the settings.', 'av-subscribe' );?></p>
<p>
	<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title', 'av-subscribe' );?>: </label>
	<input type="text" 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'title' );?>" 
			name="<?php echo $this->get_field_name( 'title' );?>" 
			value="<?php echo esc_attr( $instance['title'] );?>">
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'channel_id' );?>"><?php _e( 'Channel ID', 'av-subscribe' );?>: </label>
	<input type="text" 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'channel_id' );?>" 
			name="<?php echo $this->get_field_name( 'channel_id' );?>" 
			value="<?php echo esc_attr( $instance['channel_id'] );?>">
</p>
<p style="margin-bottom:0;">
	<label for="<?php echo $this->get_field_id( 'text' );?>"><?php _e( 'Subscribe text', 'av-subscribe' );?>: </label>
	<input type="text" 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'text' );?>" 
			name="<?php echo $this->get_field_name( 'text' );?>" 
			value="<?php echo esc_attr( $instance['text'] );?>">
</p>
<table style="border:0;width:100%;margin:0;">
	<tr>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'layout' );?>"><?php _e( 'Layout', 'av-subscribe' );?>: </label>
				<select 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'layout' );?>" 
						name="<?php echo $this->get_field_name( 'layout' );?>">
					<option value="default" <?php echo av_set_select( $this->get_field_name( 'layout' ), 'default', ( "default" == $instance['layout'] ) );?>><?php _e( 'default', 'av-subscribe' );?></option>
					<option value="full" <?php echo av_set_select( $this->get_field_name( 'layout' ), 'full', ( "full" == $instance['layout'] ) );?>><?php _e( 'full', 'av-subscribe' );?></option>
				</select>
			</p>
		</td>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'theme' );?>"><?php _e( 'Theme', 'av-subscribe' );?>: </label>
				<select 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'theme' );?>" 
						name="<?php echo $this->get_field_name( 'theme' );?>">
					<option value="default" <?php echo av_set_select( $this->get_field_name( 'theme' ), 'default', ( "default" == $instance['theme'] ) );?>><?php _e( 'default', 'av-subscribe' );?></option>
					<option value="dark" <?php echo av_set_select( $this->get_field_name( 'theme' ), 'dark', ( "dark" == $instance['theme'] ) );?>><?php _e( 'dark', 'av-subscribe' );?></option>
				</select>
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'subscribers' );?>"><?php _e( 'Subscribers count', 'av-subscribe' );?>: </label>
				<select 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'subscribers' );?>" 
						name="<?php echo $this->get_field_name( 'subscribers' );?>">
					<option value="default" <?php echo av_set_select( $this->get_field_name( 'subscribers' ), 'default', ( "default" == $instance['subscribers'] ) );?>><?php _e( 'default', 'av-subscribe' );?></option>
					<option value="hidden" <?php echo av_set_select( $this->get_field_name( 'subscribers' ), 'hidden', ( "hidden" == $instance['subscribers'] ) );?>><?php _e( 'hidden', 'av-subscribe' );?></option>
				</select>
			</p>
		</td>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'align' );?>"><?php _e( 'Widget align', 'av-subscribe' );?>: </label>
				<select 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'align' );?>" 
						name="<?php echo $this->get_field_name( 'align' );?>">
					<option value="left" <?php echo av_set_select( $this->get_field_name( 'align' ), 'left', ( "left" == $instance['align'] ) );?>><?php _e( 'left', 'av-subscribe' );?></option>
					<option value="center" <?php echo av_set_select( $this->get_field_name( 'align' ), 'center', ( "center" == $instance['align'] ) );?>><?php _e( 'center', 'av-subscribe' );?></option>
					<option value="right" <?php echo av_set_select( $this->get_field_name( 'align' ), 'right', ( "right" == $instance['align'] ) );?>><?php _e( 'right', 'av-subscribe' );?></option>
				</select>
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'color' );?>"><?php _e( 'Font color', 'av-subscribe' );?>: </label>
				<input type="text" 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'color' );?>" 
						name="<?php echo $this->get_field_name( 'color' );?>" 
						value="<?php echo esc_attr( $instance['color'] );?>">
			</p>		
		</td>
		<td>
			<p>
				<label for="<?php echo $this->get_field_id( 'bgcolor' );?>"><?php _e( 'Background color', 'av-subscribe' );?>: </label>
				<input type="text" 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'bgcolor' );?>" 
						name="<?php echo $this->get_field_name( 'bgcolor' );?>" 
						value="<?php echo esc_attr( $instance['bgcolor'] );?>">
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<p>
				<label for="<?php echo $this->get_field_id( 'bordercolor' );?>"><?php _e( 'Border color', 'av-subscribe' );?>: </label>
				<input type="text" 
						class="widefat" 
						id="<?php echo $this->get_field_id( 'bordercolor' );?>" 
						name="<?php echo $this->get_field_name( 'bordercolor' );?>" 
						value="<?php echo esc_attr( $instance['bordercolor'] );?>">
			</p>
		</td>
	</tr>
</table>