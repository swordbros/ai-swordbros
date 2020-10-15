<?php
return [
      'jqadm' => [
        'navbar' => [
            'swordbros'=>['swordbros/slider', 'swordbros/review']
         ],
        'resource' =>[
            'swordbros' => [
                'groups' => ['admin', 'editor', 'super'],
                'review' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'SR',
                ],
                'slider' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'SS',
                ],
            ],
        ],
    ],
	'jsonadm' => [
	],
];