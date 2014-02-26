<?php

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Table(name="employee")
 * @ORM\Entity
 */
class Employee extends Entity
{
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
    protected $age;




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
    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;

      }





}