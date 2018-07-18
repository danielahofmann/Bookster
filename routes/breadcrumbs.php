<?php

/**
 * SENIOR BREADCRUMBS
 */
Breadcrumbs::for('seniors-home', function ($trail) {
	$trail->push('Startseite', route('seniors-home'));
});

// Startseite > Kategorie
Breadcrumbs::for('seniors-category', function ($trail, $category, $categoryId) {
	$trail->parent('seniors-home');
	$trail->push($category, route('seniors-category', $categoryId));
});

// Home > Kategorie > Product
Breadcrumbs::for('seniors-product', function ($trail, $product, $productId, $categoryId, $categoryName) {
	$trail->parent('seniors-category', $categoryName, $categoryId);
	$trail->push($product, route('seniors-product', $productId));
});

// Home > Wunschliste
Breadcrumbs::for('seniors-wishlist', function ($trail) {
	$trail->parent('seniors-home');
	$trail->push('Wunschliste', route('seniors-wishlist'));
});

// Startseite > Hilfe
Breadcrumbs::for('seniors-help', function ($trail) {
	$trail->parent('seniors-home');
	$trail->push('Hilfe', route('seniors-help'));
});

// Startseite > Hilfe > Lieferung
Breadcrumbs::for('seniors-help-delivery', function ($trail) {
	$trail->parent('seniors-help');
	$trail->push('Lieferung', route('seniors-help-delivery'));
});

// Startseite > Hilfe > Zahlung
Breadcrumbs::for('seniors-help-payment', function ($trail) {
	$trail->parent('seniors-help');
	$trail->push('Zahlung', route('seniors-help-payment'));
});

// Startseite > Hilfe > Retoure
Breadcrumbs::for('seniors-help-retoure', function ($trail) {
	$trail->parent('seniors-help');
	$trail->push('Retoure & Rückerstattung', route('seniors-help-retoure'));
});
// Startseite > Hilfe > Retoure
Breadcrumbs::for('seniors-help-order', function ($trail) {
	$trail->parent('seniors-help');
	$trail->push('Probleme mit der Bestellung', route('seniors-help-order'));
});

/**
 * ELDERLY BREADCRUMBS
 */
Breadcrumbs::for('elderly-home', function ($trail) {
	$trail->push('Startseite', route('elderly-home'));
});

// Home > Kategorie
Breadcrumbs::for('elderly-category', function ($trail, $category, $categoryId) {
	$trail->parent('elderly-home');
	$trail->push($category, route('elderly-category', $categoryId));
});

// Home > Kategorie > Product
Breadcrumbs::for('elderly-product', function ($trail, $product, $productId, $categoryId, $categoryName) {
	$trail->parent('elderly-category', $categoryName, $categoryId);
	$trail->push($product, route('elderly-product', $productId));
});

/**
 * DEFAULT BREADCRUMBS
 */
Breadcrumbs::for('default-home', function ($trail) {
	$trail->push('Startseite', route('default-home'));
});

// Home > Kategorie
Breadcrumbs::for('default-category', function ($trail, $category, $categoryId) {
	$trail->parent('default-home');
	$trail->push($category, route('default-category', $categoryId));
});

// Home > Kategorie > Product
Breadcrumbs::for('default-product', function ($trail, $product, $productId, $categoryId, $categoryName) {
	$trail->parent('default-category', $categoryName, $categoryId);
	$trail->push($product, route('default-product', $productId));
});

/**
 * TEENS BREADCRUMBS
 */
Breadcrumbs::for('teens-home', function ($trail) {
	$trail->push('Startseite', route('teens-home'));
});

// Home > Kategorie
Breadcrumbs::for('teens-category', function ($trail, $category, $categoryId) {
	$trail->parent('teens-home');
	$trail->push($category, route('teens-category', $categoryId));
});

// Home > Kategorie > Product
Breadcrumbs::for('teens-product', function ($trail, $product, $productId, $categoryId, $categoryName) {
	$trail->parent('teens-category', $categoryName, $categoryId);
	$trail->push($product, route('teens-product', $productId));
});