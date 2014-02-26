<?php
/**
 * Created by JetBrains PhpStorm.
 * User: subbalakshmi
 * Date: 16/12/13
 * Time: 10:33 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;

/**
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="Application\Model\Repository\admin")
 */
class Admin extends TimeStamped
{

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=256)
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $status;

    /**
     * @ORM\Column(type="string", nullable=true)
     * Salt
     * @var String
     */
    protected $salt;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $pictureThumb;




    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($fname) {
        $this->first_name = $fname;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($lname) {
        $this->last_name = $lname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPictureThumb()
    {
        return $this->pictureThumb;
    }
    public function setPictureThumb($picture)
    {
        $this->pictureThumb = $picture;
    }

    public static function getCryptPassword($password, $salt){
        $bCrypt = new Bcrypt();
        $bCrypt->setSalt(md5($salt));
        return $bCrypt->create($password);
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getAdminGroup() {
        return $this->admin_group;
    }

    public function setAdminGroup($admin_group) {
        $this->admin_group = $admin_group;
    }

    public function getAdminNotification() {
        return $this->admin_notification;
    }

    public function setAdminNotification($admin_notification) {
        $this->admin_notification = $admin_notification;
    }


}