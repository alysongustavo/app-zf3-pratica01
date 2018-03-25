<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 23/03/2018
 * Time: 21:33
 */

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction(){

        return new ViewModel();
    }
}