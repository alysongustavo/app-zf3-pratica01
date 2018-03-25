<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 24/03/2018
 * Time: 21:39
 */

namespace Blog\Controller;

use Blog\Domain\Post;
use Blog\Form\PostForm;
use Blog\Service\PostService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
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

    public function addAction()
    {

        $request = $this->getRequest();

        $form = new PostForm();

        if($request->isPost())
        {

            $data = $request->getPost();
            $form->setData($data);

            if($form->isValid())
            {
                $post = new Post();
                $post->exchangeArray($form->getData());
                $this->postService->cadastrar($post);

                return $this->redirect()->toRoute('posts');
            }

        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction()
    {

        $id = $this->params()->fromRoute('id');
        $request = $this->getRequest();

        $post = $this->postService->buscarPorId($id);

        $form = new PostForm();
        $form->setData($post->toArray());

        if($request->isPost())
        {
            $data = $request->getPost();
            $form->setData($data);

            if($form->isValid())
            {
                $post = new Post();
                $post->exchangeArray($form->getData());
                $this->postService->cadastrar($post);

                return $this->redirect()->toRoute('posts');
            }

        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $this->postService->deletar($id);
        return $this->redirect()->toRoute('posts');
    }



}