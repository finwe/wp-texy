<?php

/*
Plugin Name: WP Texy
Version: 0.1
Description: Texy! is text-to-HTML formatter and converter library. It allows you to write structured documents without knowledge or using of HTML language. You write documents in humane easy-to-read plain text format and Texy! converts it to structurally and valid (X)HTML code.
Author: Finwe, David Grudl
*/

class TexyPlugin
{

	private static $texy;

	public static function texy($content)
	{
		self::init();

		return self::$texy->process($content);
	}
	
	public static function init()
	{
		if (!self::$texy) {
			self::$texy = new \Texy\Texy();
			self::$texy->headingModule->top = 3;
		}
	}

}

add_filter('the_content', [TexyPlugin::class, 'texy']);
