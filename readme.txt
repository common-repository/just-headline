=== Just Headline ===
Plugin Name: Just Headline
Description: Widget to easy add a single HTML heading tag
Tags: heading tag, heading, widget
Version: 1.0
Contributors: aprokopenko
Author: JustCoded / Alex Prokopenko
Author URI: http://justcoded.com/
License: GPL2
Requires at least: 4.3
Tested up to: 4.8.2
Stable tag: trunk

Widget to easy add a single HTML heading tag

== Description ==

After installation, you will have a new widget available called "Just Headline".

It can insert the html heading tag h1-h6 into the sidebar or any other widgetized areas (like Page Builders).

Furthermore, you can select a style for it (by default, several pre-defined html tag class names).

= Customization =

You can change available heading sizes and styles with filter hooks. Please check FAQ for more information.


== Installation ==

1. Download, unzip and upload to your WordPress plugins directory.
2. Activate the plugin within your WordPress Administration Backend.
3. You can use the widget now.

== Upgrade Notice ==

To upgrade remove the old plugin folder. After than follow the installation steps 1-2. All settings will be saved.


== Frequently asked questions ==

= Q: How can I edit a Heading sizes list? =
A: You can add the `jhl_tags_list` filter hook from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: How can I edit Heading styles list? =
A: You can add the `jhl_styles_list` filter hook from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: Can I modify the default classes for styles? =
A: You can add the `jhl_styles_attributes` filter hook from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: Can I add additional wrappers for the title inside the heading tag? =
A: You can add the `jhl_title filter` hook from your theme or plugin. You will have a title value string as a parameter.

== Screenshots ==

1. Widget options

== Changelog ==
* Version 1.0
	* First version of the plugin
