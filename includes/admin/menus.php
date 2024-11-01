<?php

/**
 * Plugin admin menu
 *
 * @return void
 */
function AV_YT_admin_menus() {

	$av_plugins 		= av_get_plugins();
	$parent_menu_slug	= 'options-general.php';

	if ( count($av_plugins) > 1 && empty ( $GLOBALS['admin_page_hooks']['AV_themes_plugin_options'] ) ) {
		
		add_menu_page( 
			__( 'AV Themes & Plugins Options', 'av-subscribe' ), // page title
			__( 'AV Settings', 'av-subscribe' ), // menu title
			'edit_theme_options', // user capability
			'AV_themes_plugin_options',	// menu slug
			'AV_Plugins_plugin_options_page', // menu callback function
			AV_YT_Options_Menu_Icon() // parent menu icon
		);

		$parent_menu_slug	= 'AV_themes_plugin_options';
	}
	
	add_submenu_page(
		$parent_menu_slug, // parent slug
		__( 'AV Channel Subscribe Options', 'av-subscribe' ), // page title
		__( 'Channel Subscribe', 'av-subscribe' ), // menu title
		'edit_theme_options', // user capability
		AV_YT_PLUGIN_SETTING_PAGE,	// menu slug
		'AV_YT_plugin_options_page', // menu callback function
		100 // position
	);
}

/**
 * Admin menu icon
 *
 * @return void
 */
function AV_YT_Options_Menu_Icon() {

	return 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhLS0gQ3JlYXRlZCB3aXRoIElua3NjYXBlIChodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy8pIC0tPgoKPHN2ZwogICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiCiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIKICAgeG1sbnM6c3ZnPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKICAgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIgogICB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiCiAgIHhtbG5zOmlua3NjYXBlPSJodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy9uYW1lc3BhY2VzL2lua3NjYXBlIgogICB3aWR0aD0iNTEyIgogICBoZWlnaHQ9IjUxMiIKICAgdmlld0JveD0iMCAwIDEzNS40NjY2NiAxMzUuNDY2NjciCiAgIHZlcnNpb249IjEuMSIKICAgaWQ9InN2ZzgiCiAgIGlua3NjYXBlOnZlcnNpb249IjAuOTIuMyAoMjQwNTU0NiwgMjAxOC0wMy0xMSkiCiAgIHNvZGlwb2RpOmRvY25hbWU9ImxvZ28tMi5zdmciPgogIDxkZWZzCiAgICAgaWQ9ImRlZnMyIiAvPgogIDxzb2RpcG9kaTpuYW1lZHZpZXcKICAgICBpZD0iYmFzZSIKICAgICBwYWdlY29sb3I9IiNmZmZmZmYiCiAgICAgYm9yZGVyY29sb3I9IiM2NjY2NjYiCiAgICAgYm9yZGVyb3BhY2l0eT0iMS4wIgogICAgIGlua3NjYXBlOnBhZ2VvcGFjaXR5PSIwLjAiCiAgICAgaW5rc2NhcGU6cGFnZXNoYWRvdz0iMiIKICAgICBpbmtzY2FwZTp6b29tPSIwLjM1IgogICAgIGlua3NjYXBlOmN4PSItOTcuMTQyODU3IgogICAgIGlua3NjYXBlOmN5PSI1NjAiCiAgICAgaW5rc2NhcGU6ZG9jdW1lbnQtdW5pdHM9Im1tIgogICAgIGlua3NjYXBlOmN1cnJlbnQtbGF5ZXI9ImxheWVyMSIKICAgICBzaG93Z3JpZD0iZmFsc2UiCiAgICAgdW5pdHM9InB4IgogICAgIGlua3NjYXBlOndpbmRvdy13aWR0aD0iMTkyMCIKICAgICBpbmtzY2FwZTp3aW5kb3ctaGVpZ2h0PSIxMDU1IgogICAgIGlua3NjYXBlOndpbmRvdy14PSIxOTIwIgogICAgIGlua3NjYXBlOndpbmRvdy15PSIwIgogICAgIGlua3NjYXBlOndpbmRvdy1tYXhpbWl6ZWQ9IjEiIC8+CiAgPG1ldGFkYXRhCiAgICAgaWQ9Im1ldGFkYXRhNSI+CiAgICA8cmRmOlJERj4KICAgICAgPGNjOldvcmsKICAgICAgICAgcmRmOmFib3V0PSIiPgogICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2Uvc3ZnK3htbDwvZGM6Zm9ybWF0PgogICAgICAgIDxkYzp0eXBlCiAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4KICAgICAgICA8ZGM6dGl0bGU+PC9kYzp0aXRsZT4KICAgICAgPC9jYzpXb3JrPgogICAgPC9yZGY6UkRGPgogIDwvbWV0YWRhdGE+CiAgPGcKICAgICBpbmtzY2FwZTpsYWJlbD0iTGF5ZXIgMSIKICAgICBpbmtzY2FwZTpncm91cG1vZGU9ImxheWVyIgogICAgIGlkPSJsYXllcjEiCiAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCwtMTYxLjUzMzMyKSI+CiAgICA8ZwogICAgICAgaWQ9Imc5MzYiCiAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgxLjI5MDUzMjgsMCwwLDEuMjkwNTMyOCwtMTkuNjc4NzQ2LC02Ni42MDk0NzIpIgogICAgICAgc3R5bGU9InN0cm9rZS13aWR0aDowLjc3NDg3Mzc5Ij4KICAgICAgPHBhdGgKICAgICAgICAgZD0ibSAxNS4yNDg1NDMsMjU3LjA1MzQ5IGggMTQuNDI5OTIgbCA0LjczNTk3MywtOC4wNjU5NSA3LjEwMzk2MSwtMTEuMDk5OTQgMTAuMDYzOTQ0LC0xNy4xNjc5MSB2IDkuMTAxOTUgOC4wNjU5NiAxMS4wOTk5NCA4LjA2NTk1IEggNjUuNzE2MjYyIFYgMjAxLjQ3OTggSCA1MC41NDYzNDcgWiIKICAgICAgICAgc3R5bGU9ImZvbnQtc3R5bGU6bm9ybWFsO2ZvbnQtdmFyaWFudDpub3JtYWw7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXN0cmV0Y2g6bm9ybWFsO2ZvbnQtc2l6ZTo3My45OTk1ODgwMXB4O2xpbmUtaGVpZ2h0OjEuMjU7Zm9udC1mYW1pbHk6J0lsbGVnYWwgQ3VydmVzJzstaW5rc2NhcGUtZm9udC1zcGVjaWZpY2F0aW9uOidJbGxlZ2FsIEN1cnZlcyBCb2xkJztsZXR0ZXItc3BhY2luZzowcHg7d29yZC1zcGFjaW5nOjBweDtmaWxsOiMwMDAwMDA7ZmlsbC1vcGFjaXR5OjAuOTQxMTc2NDc7c3Ryb2tlOm5vbmU7c3Ryb2tlLXdpZHRoOjAuMjA1MDE4NjciCiAgICAgICAgIGlkPSJwYXRoOTI3IgogICAgICAgICBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiAvPgogICAgICA8cGF0aAogICAgICAgICBkPSJtIDgzLjM2NjMxOSwyMzcuNTE3NiB2IC0yMy42Nzk4NyBoIDUuMDMxOTcyIFYgMjAxLjU1MzggaCAtNS4wMzE5NzIgLTUuMTc5OTcxIC05LjI0OTk0OSB2IDU1LjQyNTY5IEggODUuMzY0MzA4IEwgMTIwLjIxODExLDIwMS41NTM4IEggMTA0LjgyNjIgWiIKICAgICAgICAgc3R5bGU9ImZvbnQtc3R5bGU6bm9ybWFsO2ZvbnQtdmFyaWFudDpub3JtYWw7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXN0cmV0Y2g6bm9ybWFsO2ZvbnQtc2l6ZTo3My45OTk1ODgwMXB4O2xpbmUtaGVpZ2h0OjEuMjU7Zm9udC1mYW1pbHk6J0lsbGVnYWwgQ3VydmVzJzstaW5rc2NhcGUtZm9udC1zcGVjaWZpY2F0aW9uOidJbGxlZ2FsIEN1cnZlcyBCb2xkJztsZXR0ZXItc3BhY2luZzowcHg7d29yZC1zcGFjaW5nOjBweDtmaWxsOiMwMDAwMDA7ZmlsbC1vcGFjaXR5OjAuOTQxMTc2NDc7c3Ryb2tlOm5vbmU7c3Ryb2tlLXdpZHRoOjAuMjA1MDE4NjciCiAgICAgICAgIGlkPSJwYXRoOTI5IgogICAgICAgICBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiAvPgogICAgPC9nPgogIDwvZz4KPC9zdmc+Cg==';
}