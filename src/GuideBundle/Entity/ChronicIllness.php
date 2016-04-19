<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChronicIllness
 *
 * @ORM\Table(name="chronic_illness")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\ChronicIllnessRepository")
 */
class ChronicIllness
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
     * @ORM\ManyToMany(targetEntity="Medicines", inversedBy="ChronicIllness")
     * @ORM\JoinTable(name="ChIll_to_medic",
     *       joinColumns={@ORM\JoinColumn(name="ChIll_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="medic_id", referencedColumnName="id")})
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
     * @return ChronicIllness
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

