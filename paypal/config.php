<?php
  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); }
	define('PPL_MODE', 'sandbox');
	if(PPL_MODE=='sandbox'){
		define('PPL_API_USER', 'waqas1_api1.gmail.com');
		define('PPL_API_PASSWORD', '92R6ZW4EBCZ36TGC');
		define('PPL_API_SIGNATURE', 'A6paVutjtNZJ4oOan3cpTdXeJadIA7o10xVVLpEQW3cbCE8AeOQ5jerM');
	}else{
		define('PPL_API_USER', 'somepaypal_api.yahoo.co.uk');
		define('PPL_API_PASSWORD', '123456789');
		define('PPL_API_SIGNATURE', 'opupouopupo987kkkhkixlksjewNyJ2pEq.Gufar');
	}
	define('PPL_LANG', 'EN');
	define('PPL_LOGO_IMG', '');
	define('PPL_RETURN_URL', $link.'/success.php');
	define('PPL_CANCEL_URL', $link.'/cancel_url.php');
	define('PPL_CURRENCY_CODE', 'USD');