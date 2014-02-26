<?php
namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Entity
 * @package Application\Model
 * @ORM\MappedSuperclass
 */
abstract class Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @param int $id
     *
     * Don't allow overrides
     */
    private function setId($id){}

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}