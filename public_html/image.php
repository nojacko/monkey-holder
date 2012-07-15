<?php 
if (isset($_GET['x']) && isset($_GET['y'])) {
	// Settings
	date_default_timezone_set('UTC');
	
	// Includes
	include('../monkeys.php');
	
	// Constants
	define('TIME', mktime(date('H'), 0, 0, date("m"), date("d"), date("Y")));
	define('PATH_ORIGINAL', '../master/');
	define('PATH_GENERATED', 'images/');
	
	// Headers
	$week = 60*60*24*7;
	header('Content-Type: image/jpeg;');
	header('Last-Modified: ' . gmdate('r', TIME)); 
	header('Expires: ' . gmdate('r', TIME + $week));  
	header('Cache-Control: public, max-age='.$week);
	
	// Set x & y
	$x = (int) $_GET['x'];
	$y = (int) $_GET['y'];
	$g = ($_GET['g'] === 'g') ? 'g' : '';
	
	// Max/Min
	$x = ($x > 1500) ? 1500 : (($x < 1) ? 1 : $x);
	$y = ($y > 1500) ? 1500 : (($y < 1) ? 1 : $y);
	
	// Image Selection
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
		$n 			= ((int) $_GET['n']) % $NOMONKEYS;
		$n			= ($n == 0) ? $NOMONKEYS : $n;
		$filename 	= $g.$x.'x'.$y.'-'.$n.'.jpg';
	} else {
		$n = rand(1, $NOMONKEYS);
		$filename 	= $g.$x.'x'.$y.'.jpg';
	}
	
	if (file_exists(PATH_GENERATED.$filename)) {
		readfile(PATH_GENERATED.$filename);
		exit;	
	} 
	
	// Generate Image
	require '../vendor/autoload.php';
	$img = new \Twuddle\Core\Image(); 
	$img->load(PATH_ORIGINAL.$n .'.jpg');
	$img->resizeCrop($x, $y, $img::CENTER);
	if ($g === 'g') {
		$img->addFilter(IMG_FILTER_GRAYSCALE);
	}
	$img->save(
		PATH_GENERATED.$filename, 
		array('quality' => 70, 'chmod' => 775)
	);
	$img->output();
}