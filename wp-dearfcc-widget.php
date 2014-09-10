<?php
/*
 * Plugin Name: Dear FCC
 * Description: Embed a widget defending net neutrality by the eff.org (https://www.eff.org/deeplinks/2014/09/reddit-pornhub-websites-slow-down-net-neutrality-september-10)
 */

class Dear_FCC_Widget {

	static $slowdown_day = '2014-09-10';

	static $options = array(
			'animation' => 'banner',
			'theme' => 'light',
			'position' => 'bottomright',
	);

	function is_slowdown_day() {
		return (date('Y-m-d') == self::$slowdown_day);
	}

	function enqueue_scripts() {
		if (self::is_slowdown_day()) {
			wp_enqueue_script( 'dearfcc', 'https://s.eff.org/dearfcc-widget/widget.min.js', array(), null, true );
			wp_localize_script( 'dearfcc', '_bftn_options', self::$options );
		}
	}
}

add_action( 'wp_enqueue_scripts', array( 'Dear_FCC_Widget', 'enqueue_scripts' ), 2 );