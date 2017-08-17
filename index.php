<?php

use Pagekit\Application;
use Spqr\Shariff\Plugin\ShariffPlugin;

return [
	'name' => 'spqr/shariff',
	'type' => 'extension',
	'main' => function( Application $app ) {
	},
	
	'autoload' => [
		'Spqr\\Shariff\\' => 'src'
	],
	
	'nodes'  => [],
	'routes' => [
		'/api/shariff' => [
			'name'       => '@shariff/api',
			'controller' => [
				'Spqr\\Shariff\\Controller\\ShariffApiController'
			]
		]
	],
	
	'widgets' => [],
	
	'menu' => [],
	
	'permissions' => [
		'linker: manage settings'   => [
			'title' => 'Manage settings'
		],
		'linker: manage targets'    => [
			'title' => 'Manage targets'
		],
		'linker: manage statistics' => [
			'title' => 'Manage statistics'
		]
	],
	
	'settings' => 'shariff-settings',
	
	'resources' => [
		'spqr/shariff:' => ''
	],
	
	'config' => [
		'nodes'           => [],
		'position'        => 'bottom',
		'orientation'     => 'horizontal',
		'backend'         => false,
		'backend_url'     => '@shariff/api',
		'flattr_category' => '',
		'flattr_user'     => '',
		'lang'            => 'en',
		'mail_body'       => '',
		'mail_subject'    => '',
		'mail_url'        => 'mailto:',
		'media_url'       => '',
		'referrer_track'  => '',
		'services'        => [
			"facebook"      => true,
			"twitter"       => true,
			"googleplus"    => false,
			"linkedin"      => false,
			"pinterest"     => false,
			"xing"          => false,
			"addthis"       => false,
			"tumblr"        => false,
			"flattr"        => false,
			"diaspora"      => false,
			"reddit"        => false,
			"stumbleupon"   => false,
			"weibo"         => false,
			"tencent_weibo" => false,
			"qzone"         => false,
			"whatsapp"      => false,
			"threema"       => false,
			"mail"          => false,
			"info"          => true,
		],
		'theme'           => 'standard',
		'title'           => '',
		'twitter_via'     => '',
		'url'             => '',
		'facebook_api'    => [ 'app_id' => '', 'secret' => '' ],
		'ttl'             => 1
	],
	
	'events' => [
		'boot'         => function( $event, $app ) {
			$app->subscribe(
				new ShariffPlugin
			);
		},
		'site'         => function( $event, $app ) {
			$app->on(
				'view.content',
				function( $event, $scripts ) use ( $app ) {
					$app[ 'styles' ]->add(
						'fontawesome',
						'spqr/shariff:app/assets/components-font-awesome/css/font-awesome.min.css'
					);
					$app[ 'styles' ]->add(
						'spqr/shariff',
						'spqr/shariff:app/assets/shariff/build/shariff.min.css'
					);
					$app[ 'scripts' ]->add(
						'spqr/shariff',
						'spqr/shariff:app/assets/shariff/build/shariff.min.js',
						[ 'jquery' ],
						[ 'defer' => true ]
					);
				}
			);
		},
		'view.scripts' => function( $event, $scripts ) use ( $app ) {
			$scripts->register(
				'shariff-settings',
				'spqr/shariff:app/bundle/shariff-settings.js',
				[ '~extensions', 'input-tree', 'editor', 'uikit-form-password' ]
			);
		}
	]
];