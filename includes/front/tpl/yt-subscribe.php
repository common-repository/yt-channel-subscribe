<?php

/**
 * Widget template
 */

$html = '<div class="av-yt-subscribe-container" style="background-color: ' . esc_attr( $attr['bgcolor'] ) . '; border: 1px solid ' . esc_attr( $attr['bordercolor'] ) .'; padding: 5px 10px 0 10px; clear: both; text-align: ' . esc_attr( $attr['align'] ) . ';"><div class="av-yt-text" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; vertical-align: top; display: inline-block; height: 24px; margin-right: 5px; padding-top: 4px; font-family: Arial, Helvetica, Verdana, sans-serif, sans; font-size: 13px; color: ' . esc_attr( $attr['color'] ) . '">' . esc_html( $attr['text'] ) . '</div><div class="av-yt-subscribe-btn g-ytsubscribe" data-channelid="' . esc_attr( $attr['channel_id'] ) .'" data-layout="' . esc_attr( $attr['layout'] ) . '" data-theme="' . esc_attr( $attr['theme'] ) . '" data-count="' . esc_attr( $attr['subscribers'] ) . '"></div></div>';