<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatientCharacteristics
 *
 * @ORM\Table(name="patient_characteristics")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\PatientCharacteristicsRepository")
 */
class PatientCharacteristics
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
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Actors")
     * @ORM\JoinColumn(name="actorId", referencedColumnName="id")
     */
    private $actorId;

    /**
     * @var string
     *
     * @ORM\Column(name="allergy", type="string", length=60, nullable=true)
     */
    private $allergy;

    /**
     * @var string
     *
     * @ORM\Column(name="chronic_diseases", type="string", length=60, nullable=true)
     */
    
    private $chronic_diseases;

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
     * Set actorId
     *
     * @param integer $actorId
     *
     * @return PatientCharacteristics
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;

        return $this;
    }

    /**
     * Get actorId
     *
     * @return int
     */
    public function getActorId()
    {
        return $this->actorId;
    }

    /**
     * Set allergy
     *
     * @param string $allergy
     *
     * @return PatientCharacteristics
     */
    public function setAllergy($allergy)
    {
        $this->allergy = $allergy;

        return $this;
    }

    /**
     * Get allergy
     *
     * @return string
     */
    public function getAllergy()
    {
        return $this->allergy;
    }

    /**
     * Set chronic_diseases
     *
     * @param string $chronic_diseases
     *
     * @return PatientCharacteristics
     */
    public function setChronicDieseases($chronic_diseases)
    {
        $this->chronic_diseases = $chronic_diseases;

        return $this;
    }

    /**
     * Get chronic_diseases
     *
     * @return string
     */
    public function getChronicDieseases()
    {
        return $this->chronic_diseases;
    }
}

