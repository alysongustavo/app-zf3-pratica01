<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 24/03/2018
 * Time: 23:22
 */

namespace Blog\Filter;


use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class PostFilter extends InputFilter
{

    public function __construct()
    {

        $this->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 128,
                        'messages' => [
                            StringLength::TOO_SHORT => 'A entrada tem menos de 1 caracteres'
                        ]
                    ],
                ],
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O titulo deve ser informado'
                        ]
                    ]
                ]
            ],
        ]);

        $this->add([
            'name' => 'text',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 1000,
                        'messages' => [
                            StringLength::TOO_SHORT => 'A entrada tem menos de 1 caracteres'
                        ]
                    ],
                ],
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O texto deve ser informado'
                        ]
                    ]
                ]
            ],
        ]);


    }
}