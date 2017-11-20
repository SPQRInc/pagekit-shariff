<?php

use Pagekit\Application;
use Spqr\Shariff\Plugin\ShariffPlugin;

return [
    'name' => 'spqr/shariff',
    'type' => 'extension',
    'main' => function (Application $app) {
    },
    
    'autoload' => [
        'Spqr\\Shariff\\' => 'src',
    ],
    
    'nodes' => [],
    
    'routes' => [
        '/api/shariff' => [
            'name'       => '@shariff/api',
            'controller' => [
                'Spqr\\Shariff\\Controller\\ShariffApiController',
            ],
        ],
    ],
    
    'widgets' => [
        'widgets/shariff.php',
    ],
    
    'menu' => [],
    
    'permissions' => [],
    
    'settings' => 'shariff-settings',
    
    'resources' => [
        'spqr/shariff:' => '',
    ],
    
    'config' => [
        'autoinsert'      => true,
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
        'facebook_api'    => ['app_id' => '', 'secret' => ''],
        'ttl'             => 1,
    ],
    
    'events' => [
        'boot'         => function ($event, $app) {
            $app->subscribe(new ShariffPlugin);
        },
        'site'         => function ($event, $app) {
            $app->on('view.content', function ($event, $scripts) use ($app) {
                if ($this->config['autoinsert']
                    && (!$this->config['nodes']
                        || in_array($app['node']->id, $this->config['nodes']))
                ) {
                    $app['styles']->add('spqr/shariff',
                        'spqr/shariff:app/assets/shariff/build/shariff.complete.css');
                    $app['scripts']->add('spqr/shariff',
                        'spqr/shariff:app/assets/shariff/build/shariff.complete.js',
                        ['jquery'], ['defer' => true]);
                }
            });
        },
        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('shariff-settings',
                'spqr/shariff:app/bundle/shariff-settings.js',
                ['~extensions', 'input-tree', 'editor', 'uikit-form-password']);
        },
    ],
];