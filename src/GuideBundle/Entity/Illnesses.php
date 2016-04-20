<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Illnesses
 *
 * @ORM\Table(name="illnesses")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\IllnessesRepository")
 */
class Illnesses
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
     * @ORM\ManyToMany(targetEntity="Symptoms", mappedBy="illnesses")
     * @ORM\JoinTable(name="sym_to_ill",
     *       joinColumns={@ORM\JoinColumn(name="sym_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="ill_id", referencedColumnName="id")})
     */
    private $symptoms;

    /**
     * @ORM\ManyToMany(targetEntity="Medicines", inversedBy="illnesses")
     * @ORM\JoinTable(name="ill_to_medicine",
     *       joinColumns={@ORM\JoinColumn(name="ill_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="medic_id", referencedColumnName="id")})
     */
    private $medicines;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;


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
     * @return Illnesses
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

