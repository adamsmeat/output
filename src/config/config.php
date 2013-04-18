<?php

return array(
//default
	'theme' => 'default',
	'file' => 'output::template',

	// this specifies how a certain file is built 
	'composers' => array(
		'output::template' => 'Adamsmeat\Output\DefaultViewComposer',
	),

	// partials for composing
	'partials' => array(
		'head_assets'   => 'output::partials.head_assets',
		'navbar'        => 'output::partials.navbar',
		'breadcrumb'    => 'output::partials.breadcrumb',
		'alerts'        => 'output::partials.alerts',
		'sidebar'       => 'output::partials.sidebar',
		'content'       => 'output::partials.content',
		'footer'        => 'output::partials.footer',
		'footer_assets' => 'output::partials.footer_assets',
    ),

	// keys should be valid variable names
	// access as $g['key'] in view files
	// settings
 	'globals' => array(
		'site_name'   => 'BarangayPH.com', 		
		'site_headline'   => 'adamsmeat/output default template', 		
		'page_title'   => 'adamsmeat/output default template', 		
		'show_page_title'   => true, 		
		'content' => 'Default content',
	),

	'assets' => array(
		'css' => array(
			'bootstrap'    => '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css',
			'font-awesome' => '//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css',
			'main'         => '/packages/adamsmeat/output/css/main.css',
		),		
		'js' => array(
			'head' => array(
				'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
			),
			'footer' => array(
				'bootstrap' => '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js',				
				'bootstrap-plugin' => '/packages/adamsmeat/output/js/bootstrap-plugin.js',
				'angularjs' => '//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular.min.js',
				'angularjs-plugin' => '/packages/adamsmeat/output/js/angular-plugin.js',
			),
		),		
	),

	// package meta
	'readme_file' => 'https://raw.github.com/adamsmeat/output/master/README.md',

	// themes
	'basic' => array(
		'partials' => array(
			'content' => 'output::basic.partials.content',
		),
	),

	'angularjs' => array(
		'partials' => array(
			// better if finder prioritizes searching main folder for multiple-dot keyed files
			// instead of just iterating folders immediately
			//'content' => 'output::angularjs.partials.content', 
			'content' => 'output::angularjs_partials_content',
		),
	),
);