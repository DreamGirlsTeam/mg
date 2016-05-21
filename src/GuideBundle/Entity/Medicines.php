<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicines
 *
 * @ORM\Table(name="medicines")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\MedicinesRepository")
 */
class Medicines
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Illnesses", inversedBy="illnesses", cascade={"persist"})
     * @ORM\JoinTable(name="ill_to_medicine",
     *       joinColumns={@ORM\JoinColumn(name="medic_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="ill_id", referencedColumnName="id")})
     */
    private $illnesses;

    public function __construct()
    {
        $this->illnesses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIllnesses()
    {
        return $this->illnesses;
    }

    /**
     * @param mixed $illnesses
     */
    public function addIllness($illnesses)
    {
        $this->illnesses[] = $illnesses;
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
     * @return Medicines
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Medicines
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

