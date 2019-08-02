<?php

return [
	'uri' => 'http://t-rst.vchangyi.com'
];die;
$env = env('APP_ENV');
$dev = 'http://t-rst.vchangyi.com';
$test = 'http://t-rst.vchangyi.com';
$prod = 'http://t-rst.vchangyi.com';
$uri = ($env == 'dev') ? $dev : (($env == 'test') ? $test : $prod);

return $uri;

