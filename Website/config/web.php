<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'POS',
	'name'=>'POS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'timeZone' => 'Asia/Jakarta',
	
	'modules' => [
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
	
	
	
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3lgaie26tmLjMa_Ftmag3A4aik3cRRF-',
        ],
		
	'assetManager' => [
			'bundles' => [
				'yii\web\JqueryAsset' => [
					'js'=>[]
				],
				'yii\web\BootstrapAsset' => [
					'js'=>[]
				],
				'yii\bootstrap\BootstrapPluginAsset' => [
					'js'=>[]
				],
			],
		],
		
		
		'formatter' => [
			'class' => 'yii\i18n\Formatter',
			'dateFormat' => 'php:d-M-Y',
			'datetimeFormat' => 'php:d-M-Y H:i:s',
			'timeFormat' => 'php:H:i:s',
			'nullDisplay' => '',
		],
				
		
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
             'useFileTransport' => false,
			 'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'mail.mannasoftsolution.com',
				'username' => 'kss@mannasoftsolution.com',
				'password' => 'kss@mannasoftsolution.com',
				'port' => '26',
				'encryption' => '',
			  ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
