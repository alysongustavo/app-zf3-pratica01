<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 24/03/2018
 * Time: 21:04
 */

namespace Blog\DAO;


use Blog\Domain\Post;
use Zend\Db\TableGateway\AbstractTableGateway;

class PostDAO
{

    private $tableGateway;

    public function __construct(AbstractTableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }

    public function getPost($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if(!$row){
            throw new \RuntimeException(sprintf('Could not find row with identifier %d', $id));
        }

        return $row;
    }

    public function savePost(Post $post)
    {

        $data = [
          'title' => $post->getTitle(),
          'text' => $post->getText(),
          'data' => $post->getData()
        ];

        $id = (int) $post->getId();

        if($id === 0){
            $this->tableGateway->insert($data);
            return;
        }

        if(! $this->getPost($id))
        {
            throw  new \RuntimeException(sprintf('Cannot update post with identifier %d; does not exist', $id));
        }

        $this->tableGateway->update($data, ['id' => $id]);

    }

    public function deletePost($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);

    }

}