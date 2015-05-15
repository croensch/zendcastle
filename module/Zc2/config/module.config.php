<?php
return [
	'router' => [
		'routes' => [
			'zf1' => array(
				'type' => 'Segment',
				'options' => array(
					'route' => '/zc2/:controller[/:action]',
					'defaults' => array(
						'__NAMESPACE__' => 'Zc2',
						'controller' => 'zc',
						'action' => 'index'
					),
				),
				'child_routes' => array(
					'params' => array(
						'type'    => 'Wildcard',
						'options' => array(
						),
						'may_terminate' => true,
					),
				),
				'may_terminate' => true,
			),
		]
	],
    'controllers' => [
        'invokables' => [
            'Zc2\Zc' => 'Zc2\Controller\Zc'
        ],
    ],
	'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
