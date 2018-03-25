<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Blog\Service\PostService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * @var PostService
     */
    private $postService;

    public function __construct(PostService $postService)
    {

        $this->postService = $postService;
    }

    public function indexAction()
    {
        $posts = $this->postService->listar();
        return new ViewModel([
            'posts' => $posts
        ]);
    }
}
