<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 24/03/2018
 * Time: 21:28
 */

namespace Blog\Service;


use Blog\DAO\PostDAO;
use Blog\Domain\Post;

class PostService
{

    /**
     * @var PostDAO
     */
    private $postDAO;

    public function __construct(PostDAO $postDAO)
    {
        $this->postDAO = $postDAO;
    }

    public function cadastrar(Post $post)
    {
        $data = \DateTime::createFromFormat('Y-m-d H:i:s');
        $post->setData($data);
        $this->postDAO->savePost($post);
    }

    public function listar()
    {
        return $this->postDAO->fetchAll();
    }

    public function buscarPorId($id)
    {
        return $this->postDAO->getPost($id);
    }

    public function deletar($id)
    {
        $this->postDAO->deletePost($id);
    }
}