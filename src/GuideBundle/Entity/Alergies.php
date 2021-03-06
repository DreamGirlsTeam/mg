<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alergies
 *
 * @ORM\Table(name="alergies")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\AlergiesRepository")
 */
class Alergies
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Medicines", inversedBy="alergies")
     * @ORM\JoinTable(name="allergy_to_medic",
     *       joinColumns={@ORM\JoinColumn(name="medic_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="allergy_id", referencedColumnName="id")})
     */
    private $medicines;


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
     * @return Alergies
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

