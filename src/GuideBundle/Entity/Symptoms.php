<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use GuideBundle\Entity\Illnesses;

/**
 * Symptoms
 *
 * @ORM\Table(name="symptoms")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\SymptomsRepository")
 */
class Symptoms
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Illnesses", inversedBy="symptoms")
     * @ORM\JoinTable(name="sym_to_ill",
     *       joinColumns={@ORM\JoinColumn(name="ill_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="sym_id", referencedColumnName="id")})
     */
   // private $illnesses;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;


//    public function __construct() {
//        $this->illnesses = new \Doctrine\Common\Collections\ArrayCollection();
//    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Symptoms
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

