<?php

/**
 * SENIOR BREADCRUMBS
 */
Breadcrumbs::for('seniors-home', function ($trail) {
	$trail->push('Startseite', route('seniors-home'));
});

// Startseite > Kategorie
Breadcrumbs::for('seniors-category', function ($trail, $category) {
	$trail->parent('seniors-home');
	$trail->push($category, route('seniors-category', 1));
});


/**
 * ELDERLY BREADCRUMBS
 */
Breadcrumbs::for('elderly-home', function ($trail) {
	$trail->push('Startseite', route('elderly-home'));
});

// Home > Kategorie
Breadcrumbs::for('elderly-category', function ($trail, $category) {
	$trail->parent('elderly-home');
	$trail->push($category, route('elderly-category', 1));
});