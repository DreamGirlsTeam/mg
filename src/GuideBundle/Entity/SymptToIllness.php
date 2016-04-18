<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SymptToIllness
 *
 * @ORM\Table(name="sympt_to_illness")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\SymptToIllnessRepository")
 */
class SymptToIllness
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
     * @ORM\Column(name="sympId", type="integer")
     */
    private $sympId;

    /**
     * @var int
     *
     * @ORM\Column(name="illId", type="integer")
     */
    private $illId;


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
     * Set sympId
     *
     * @param integer $sympId
     *
     * @return SymptToIllness
     */
    public function setSympId($sympId)
    {
        $this->sympId = $sympId;

        return $this;
    }

    /**
     * Get sympId
     *
     * @return int
     */
    public function getSympId()
    {
        return $this->sympId;
    }

    /**
     * Set illId
     *
     * @param integer $illId
     *
     * @return SymptToIllness
     */
    public function setIllId($illId)
    {
        $this->illId = $illId;

        return $this;
    }

    /**
     * Get illId
     *
     * @return int
     */
    public function getIllId()
    {
        return $this->illId;
    }
}

