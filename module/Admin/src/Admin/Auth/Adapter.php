<?php
/**
 * To change this template use File | Settings | File Templates.
 */
namespace Admin\Auth;

use Doctrine\ORM\EntityManager;
use \Zend\Authentication\Adapter\AdapterInterface as AdapterInterface;
use Zend\Authentication\Result;
use Admin\Model\Admin as Admin;

class Adapter implements AdapterInterface
{
    /**
     * @var string $username
     */
    protected $username;

    /**
     * @var string $password
     */
    protected $password;


    /**
     * @var EntityManager $em;
     */
    protected $em;

    public function __construct($username, $password, $em, $type=null)
    {
        $this->username = $username;
        $this->password = $password;
        if($type){
            $this->user_type = $type;
        }
        $this->em       = $em;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        /**
         * @var Application\Model\User $user
         */

        $user = $this->em->getRepository('Application\Model\Admin')->findOneBy(
            array('email' => $this->username)
        );
        $cryptPassword = md5($this->password);

        if ($user && $user->getPassword() === $cryptPassword) {
            return new Result(Result::SUCCESS, $user, array());
        }

        return new Result(Result::FAILURE, array(), array());
    }

}
