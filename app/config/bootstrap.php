<?php
    uses('L10n');
    Configure::load('config');

    // Get the configuration in one read
    $appConfigurations = Configure::read('App');
    
    // lets check for multiversions
    $_SERVER['SERVER_NAME'] = str_replace('www.', '', $_SERVER['SERVER_NAME']);

	if(!empty($appConfigurations['serverName']) && !empty($appConfigurations['multiVersions'])){
		if($appConfigurations['serverName'] !== $_SERVER['SERVER_NAME']) {
			foreach($appConfigurations['multiVersions'] as $url => $details) {
				if($url == $_SERVER['SERVER_NAME']) {
					Configure::write('App.serverName', $url);
					Configure::write('App.name', $appConfigurations['multiVersions'][$url]['name']);
					Configure::write('App.url', $appConfigurations['multiVersions'][$url]['url']);
					Configure::write('App.timezone', $appConfigurations['multiVersions'][$url]['timezone']);
					Configure::write('App.language', $appConfigurations['multiVersions'][$url]['language']);
					Configure::write('App.currency', $appConfigurations['multiVersions'][$url]['currency']);
					Configure::write('App.noCents', $appConfigurations['multiVersions'][$url]['noCents']);
					Configure::write('App.theme', $appConfigurations['multiVersions'][$url]['theme']);
				}
			}
		}
	}
	
	// wwwRedirect
	if(!empty($appConfigurations['wwwRedirect'])) {
		if(substr($_SERVER['HTTP_HOST'], 0, 4) !== 'www.') {
			header('location:'.$appConfigurations['url'].$_SERVER['REQUEST_URI']);
		}
	}

	// used for setting default config values
	if(empty($appConfigurations['adminPageLimit'])) {
		Configure::write('App.adminPageLimit', 100);
	}

    // Do not change any line below
    if(!empty($appConfigurations['timezone'])){
        putenv("TZ=".$appConfigurations['timezone']);
    }

    // Set the internationalization for app
    Configure::write('Config.language', $appConfigurations['language']);

    // define the image thumb constant
    define('IMAGE_THUMB_WIDTH', $appConfigurations['Image']['thumb_width']);
    define('IMAGE_THUMB_HEIGHT', $appConfigurations['Image']['thumb_height']);
    define('IMAGE_MAX_WIDTH', $appConfigurations['Image']['max_width']);
    define('IMAGE_MAX_HEIGHT', $appConfigurations['Image']['max_height']);

    ini_set('memory_limit', $appConfigurations['memoryLimit']);
?>