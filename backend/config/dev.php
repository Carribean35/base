<?php
/**
 *
 * backend.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
defined('APP_CONFIG_NAME') or define('APP_CONFIG_NAME', 'backend');

// web application configuration
return array(
	'name' => 'Admin Panel',
	'basePath' => realPath(__DIR__ . '/..'),
	// path aliases
	'aliases' => array(
		'bootstrap' => dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiistrap',
		'yiiwheels' =>  dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiiwheels'
	),

	// application behaviors
	'behaviors' => array(),

	// controllers mappings
	'controllerMap' => array(),

	// application modules
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'yii',
			'ipFilters' => array('127.0.0.1','::1'),
		),
	),

	// application components
	'components' => array(

		'bootstrap' => array(
			'class' => 'bootstrap.components.TbApi',
		),

		'clientScript' => array(
			'scriptMap' => array(
				'bootstrap.min.css' => false,
				'bootstrap.min.js' => false,
				'bootstrap-yii.css' => false,
				'jquery.min.js' => false
			)
		),
		'urlManager' => array(
			// uncomment the following if you have enabled Apache's Rewrite module.
			'urlFormat' => 'path',
			'showScriptName' => false,

			'rules' => array(
				// default rules
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'user' => array(
			'allowAutoLogin' => true,
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
				'class'  => 'CLogRouter',
				'routes' => array(
						array(
								'class'        => 'CDbLogRoute',
								'connectionID' => 'db',
								'levels'       => 'error, warning',
						),
				),
		),
	),
	'params' => array(
			'yii.handleErrors'   => true,
			'yii.debug' => true,
			'yii.traceLevel' => 3,
	)
);