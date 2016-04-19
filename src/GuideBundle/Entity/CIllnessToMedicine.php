<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CIllnessToMedicine
 *
 * @ORM\Table(name="c_illness_to_medicine")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\CIllnessToMedicineRepository")
 */
class CIllnessToMedicine
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
     * @ORM\Column(name="cIllId", type="integer")
     */
    private $cIllId;

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
     * Set cIllId
     *
     * @param integer $cIllId
     *
     * @return CIllnessToMedicine
     */
    public function setCIllId($cIllId)
    {
        $this->cIllId = $cIllId;

        return $this;
    }

    /**
     * Get cIllId
     *
     * @return int
     */
    public function getCIllId()
    {
        return $this->cIllId;
    }

    /**
     * Set medicId
     *
     * @param integer $medicId
     *
     * @return CIllnessToMedicine
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

