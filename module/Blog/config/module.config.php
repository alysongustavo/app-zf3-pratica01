<?php

namespace Blog;

use Blog\Controller\Factory\PostControllerFactory;
use Blog\Controller\IndexController;
use Blog\Controller\PostController;
use Blog\DAO\Factory\PostDAOFactory;
use Blog\DAO\PostDAO;
use Blog\Service\Factory\PostServiceFactory;
use Blog\Service\PostService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
  'router' => [
    'routes' => [
        'index' => [
            'type' => Literal::class,
            'options' => [
                'route' => '/blog',
                'defaults' => [
                    'controller' => IndexController::class,
                    'action' => 'index'
                ]
            ]
        ],
        'posts' => [
            'type' => Segment::class,
            'options' => [
                'route' => '/blog/posts[/:action[/:id]]',
                'constraints' => [
                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'id'     => '[0-9]+',
                ],
                'defaults' => [
                    'controller' => PostController::class,
                    'action' => 'index'
                ]
            ]
        ]
    ]
  ],
  'controllers' => [
      'factories' => [
        IndexController::class => InvokableFactory::class,
        PostController::class => PostControllerFactory::class
      ]
  ],
  'service_manager' => [
      'factories' => [
          // DAO
          PostDAO::class => PostDAOFactory::class,
          // Service
          PostService::class => PostServiceFactory::class
      ]
  ],
  'view_manager' => [
      'template_path_stack' => [
          'blog' => __DIR__ . '/../view'
      ]
  ]
];