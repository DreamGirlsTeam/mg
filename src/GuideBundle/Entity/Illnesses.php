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
     *       joinColumns={@ORM\JoinColumn(name="ill_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="sym_id", referencedColumnName="id")})
     */
    private $symptoms;

    /**
     * @return mixed
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * @param mixed $symptoms
     */
    public function setSymptoms($symptoms)
    {
        $this->symptoms = $symptoms;
    }


    public function getMedicines()
    {
        return $this->medicines;
    }

    /**
     * @param mixed $medicines
    */
    public function addMedicine($medicines)
    {
        $this->medicines[] = $medicines;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Medicines", mappedBy="medicines", cascade={"persist"})
     */
    private $medicines;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;

    /**
     * Illnesses constructor.
     */
    public function __construct()
    {
        $this->symptoms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medicines = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addSymptom($symptoms)
    {
        $this->symptoms[] = $symptoms;

        return $this;
    }

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

