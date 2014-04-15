<?php

/**
 * Override theme_breadrumb().
 *
 * Print breadcrumbs as a list, with separators.
 */

function spacious_breadcrumb($variables) {
	global $base_url;
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$breadcrumb[] = drupal_get_title();
		$breadcrumbs = '<ol class="breadcrumb">';
		$count = count($breadcrumb) - 1;
		foreach ($breadcrumb as $key => $value) {
			if ($key == 0) {
				$breadcrumbs .= '<li><a class="displayb" href="' . $base_url .'"><span class="glyphicon glyphicon-home"></span></a>' . $value . '</li>';
			}
			else {
				$breadcrumbs .= '<li>' . $value . '</li>';
			}
		}
		$breadcrumbs .= '</ol>';
		return $breadcrumbs;
	}
}

/**
 *  Menu tree alter
 */

function spacious_menu_tree($variables) {
  return '<ul class="margin0 menu padding0">' . $variables['tree'] . '</ul>';
}

/**
 *  Secondary menu alter
 */

function spacious_links__system_secondary_menu(&$variables) {
    $output = '';
    $extra_classes = array(
        'user' => 'secnav_account',
        'user/logout' => 'secnav_logout',
    );

    foreach ($variables['links'] as $item => $link) {
        $classes = array($item);
        if (isset($extra_classes[$link['href']])) {
            $classes[] = $extra_classes[$link['href']];
        }
        $output .= sprintf('<li class="%s">%s</li>', implode(' ', $classes), l($link['title'], $link['href']));
    }
    return $output;
}
