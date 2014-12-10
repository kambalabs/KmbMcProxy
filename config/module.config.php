<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbMcProxy\Http\Client' => 'Zend\Http\Client',
        ],
        'factories' => [
            'KmbMcProxy\Client' => 'KmbMcProxy\ClientFactory',
            'KmbMcProxy\Service\Agent' => 'KmbMcProxy\Service\AgentFactory',
            'KmbMcProxy\Service\Patch' => 'KmbMcProxy\Service\PatchFactory',	
            'KmbMcProxy\Options\ModuleOptions' => 'KmbMcProxy\Options\ModuleOptionsFactory',
        ],
        'abstract_factories' => [
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
	'aliases' => [
	     'mcProxyAgentService' => 'KmbMcProxy\Service\Agent',
         'mcProxyPatchService' => 'KmbMcProxy\Service\Patch',
	],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],
];
