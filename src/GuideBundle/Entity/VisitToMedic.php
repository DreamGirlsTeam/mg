<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VisitToMedic
 *
 * @ORM\Table(name="visit_to_medic")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\VisitToMedicRepository")
 */
class VisitToMedic
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
     * @ORM\Column(name="visitId", type="integer")
     */
    private $visitId;

    /**
     * @var int
     *
     * @ORM\Column(name="illnessId", type="integer")
     */
    private $illnessId;


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
     * Set visitId
     *
     * @param integer $visitId
     *
     * @return VisitToMedic
     */
    public function setVisitId($visitId)
    {
        $this->visitId = $visitId;

        return $this;
    }

    /**
     * Get visitId
     *
     * @return int
     */
    public function getVisitId()
    {
        return $this->visitId;
    }

    /**
     * Set illnessId
     *
     * @param integer $illnessId
     *
     * @return VisitToMedic
     */
    public function setIllnessId($illnessId)
    {
        $this->illnessId = $illnessId;

        return $this;
    }

    /**
     * Get illnessId
     *
     * @return int
     */
    public function getIllnessId()
    {
        return $this->illnessId;
    }
}

