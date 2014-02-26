<?php

namespace Admin\Controller;


use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
//use Application\Model\Leaves;


class AdminController extends BaseController
{

    protected $entityManager;
    protected function setEntityManager(EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }

    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->entityManager;
    }


    protected $storage;
    protected $authservice;


    public function getAuthService()
    {
        if (! $this->authservice) {
            try {
                $this->authservice = $this->getServiceLocator()->get('AuthService');
            } catch (\Exception $e) {
                error_log($e->getMessage());
            }
        }

        return $this->authservice;
    }


    public function getSessionStorage()
    {
        if (! $this->storage) {
            $this->storage = $this->getServiceLocator()->get('Admin\Model\AuthStorage');
        }

        return $this->storage;
    }

    public function indexAction()
    {

        $auth = $this->getAuthService();

        if ($auth->hasIdentity()) {
            $this->redirect()->toUrl('/employee');
        }

        if ($this->getRequest()->isPost()) {

            $request = $this->params()->fromPost();
            $username = $request['username'];
            $password = $request['password'];

            $this->getAuthService()->getAdapter()
                ->setIdentity($username)
                ->setCredential($password);
            $result = $this->getAuthService()->authenticate();

            if ($result->isValid() === false) {// Auth failed
                return $this->redirect()->toUrl('/admin');
            } else {

                //set storage again
                $auth->getStorage()->write($result->getIdentity());

                $this->getSessionStorage()->setRememberMe(1);

                //error_log("Before redirect: ".session_id());
                //error_log("Session: ". json_encode((array)$_SESSION));
                //print "<pre>";print_r($_SESSION);die;

                return $this->redirect()->toUrl('/employee');
            }
        }
        return new ViewModel();
    }



    public function logoutAction(){

        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        //$this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toUrl('/admin');

    }

    public function index2Action()
    {


        $repository = $this->getEntityManager()->getRepository('Application\Model\Leaves');
        $posts      = $repository->findAll();
      // $form = new Leave();
        return new ViewModel(array(
         ///   'form' => $form,
            'posts' => $posts
        ) );
    }


}