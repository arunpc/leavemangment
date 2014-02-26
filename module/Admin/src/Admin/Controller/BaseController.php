<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseController extends AbstractActionController
{
    protected function getEM()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
}