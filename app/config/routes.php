<?php
	Router::connect('/', array('controller' => 'auctions', 'action' => 'home'));

	/* Admin Stuff */
	Router::connect('/admin', array('controller' => 'dashboards', 'action' => 'index', 'admin' => true));
    Router::connect('/admin/users/login', array('controller' => 'users', 'action' => 'login', 'admin' => false));
    Router::connect('/admin/users/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false));

	/* Pages Routing */
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'view'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
    Router::connect('/suggestion', array('controller' => 'pages', 'action' => 'suggestion'));

	/* Offline mode */
	Router::connect('/offline', array('controller' => 'settings', 'action' => 'offline'));

    /* Router for rss */
	Router::parseExtensions('rss');
?>