<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 24/03/2018
 * Time: 22:52
 */

namespace Blog\Form;


use Blog\Filter\PostFilter;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class PostForm extends Form
{

    public function __construct()
    {
        parent::__construct('form-post');
        $this->setInputFilter(new PostFilter());

        $id = new Hidden('id');
        $this->add($id);

        $title = new Text('title');
        $title->setLabel('Title');
        $title->setAttributes([
           'class' => 'form-control',
            'placeholder' => 'Informe o titulo'
        ]);
        $this->add($title);

        $text = new Textarea('text');
        $text->setLabel('Text');
        $text->setAttributes([
            'class' => 'form-control',
            'rows' => '3',
            'placeholder' => 'Informe o texto'
        ]);
        $this->add($text);

    }

}