<?php
/**
 * Created by PhpStorm.
 * User: i.suhoparov
 * Date: 29.01.15
 * Time: 11:07
 */

function base_href()
{
	return get_protocol().'://'.base_host();
}

function base_host()
{
	return $_SERVER['HTTP_HOST'];
}

function fatal($var, $die = false)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	if ($die) die('<br /> died by fatal()');
}

function get_protocol()
{
	$scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (
	(
		(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
		443 == $_SERVER['SERVER_PORT']
	) ? 'https' : 'http'

	);
	return $scheme;
}

function redirect($url)
{
	header('HTTP/1.0 301 Moved Permanently');
	header("X-Accel-Expires: 0");
	header('Location: ' . $url . "\n\n");
	exit;
}