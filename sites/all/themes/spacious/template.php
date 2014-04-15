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
