<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IllnessToMedic
 *
 * @ORM\Table(name="illness_to_medic")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\IllnessToMedicRepository")
 */
class IllnessToMedic
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
     * @ORM\Column(name="illId", type="integer")
     */
    private $illId;

    /**
     * @var int
     *
     * @ORM\Column(name="medicId", type="integer")
     */
    private $medicId;


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
     * Set illId
     *
     * @param integer $illId
     *
     * @return IllnessToMedic
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

    /**
     * Set medicId
     *
     * @param integer $medicId
     *
     * @return IllnessToMedic
     */
    public function setMedicId($medicId)
    {
        $this->medicId = $medicId;

        return $this;
    }

    /**
     * Get medicId
     *
     * @return int
     */
    public function getMedicId()
    {
        return $this->medicId;
    }
}

