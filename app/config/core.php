<?php
	define('LOG_ERROR', 2);

	Configure::write('Routing.admin', 'admin');

	$session = array(
		'save' => 'php',
		'cookie' => 'AUCTION',
		'timeout' => '120',
		'start' => true,
		'checkAgent' => true
		//'table' => 'cake_sessions',
		//'database' => 'default'
	);
	Configure::write('Session', $session);

	$security = array(
		'level' => 'medium',
		'salt' => '07a6b2214c954ba069dbf8196d315f83a30baef9'
	);
	Configure::write('Security', $security);

	//Configure::write('Asset.filter.css', 'css.php');
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

	//Configure::write('Acl.classname', 'DbAcl');
	//Configure::write('Acl.database', 'default');

	Cache::config('default', array('engine' => 'File'));
?>
