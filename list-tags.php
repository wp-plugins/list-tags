<?php
/*
Plugin Name: List Tags
Plugin URI: http://www.stevesmith1983.co.uk
Description: Adds the list_tags() template tag.  It is essentially the same function as wp_list_categories, but for tags, and as such takes the <a href="http://codex.wordpress.org/Template_Tags/wp_list_categories">same arguments</a>.
Version: 0.1
Author: Steve Smith
Author URI: http://www.stevesmith1983.co.uk

    Copyright 2008 Steve Smith  (contact : http://stevesmith1983.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function list_tags($args = '') {
	$defaults = array(
		'show_option_all' => '', 'orderby' => 'name',
		'order' => 'ASC', 'show_last_update' => 0,
		'style' => 'list', 'show_count' => 0,
		'hide_empty' => 1, 'use_desc_for_title' => 1,
		'child_of' => 0, 'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '', 'current_tag' => 0,
		'hierarchical' => true, 'title_li' => __('Tags'),
		'echo' => 1, 'depth' => 0
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
		$r['pad_counts'] = true;
	}

	if ( isset( $r['show_date'] ) ) {
		$r['include_last_update_time'] = $r['show_date'];
	}

	extract( $r );

	$tags = get_tags($r);

	$output = '';
	if ( $title_li && 'list' == $style )
			$output = '<li class="tags">' . $r['title_li'] . '<ul>';

	if ( empty($tags) ) {
		if ( 'list' == $style )
			$output .= '<li>' . __("No tags") . '</li>';
		else
			$output .= __("No tags");
	} else {
		global $wp_query;

		if( !empty($show_option_all) )
			if ('list' == $style )
				$output .= '<li><a href="' .  get_bloginfo('url')  . '">' . $show_option_all . '</a></li>';
			else
				$output .= '<a href="' .  get_bloginfo('url')  . '">' . $show_option_all . '</a>';

		if ( empty( $r['current_tag'] ) && is_tag() )
			$r['current_tag'] = $wp_query->get_queried_object_id();

		if ( $hierarchical )
			$depth = $r['depth'];
		else
			$depth = -1; // Flat.

		$output .= walk_category_tree($tags, $depth, $r);
	}

	if ( $title_li && 'list' == $style )
		$output .= '</ul></li>';

	$output = apply_filters('wp_list_tags', $output);

	if ( $echo )
		echo $output;
	else
		return $output;
}
?>