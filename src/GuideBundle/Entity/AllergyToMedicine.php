<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AllergyToMedicine
 *
 * @ORM\Table(name="allergy_to_medicine")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\AllergyToMedicineRepository")
 */
class AllergyToMedicine
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
     * @ORM\Column(name="allergyId", type="integer")
     */
    private $allergyId;

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
     * Set allergyId
     *
     * @param integer $allergyId
     *
     * @return AllergyToMedicine
     */
    public function setAllergyId($allergyId)
    {
        $this->allergyId = $allergyId;

        return $this;
    }

    /**
     * Get allergyId
     *
     * @return int
     */
    public function getAllergyId()
    {
        return $this->allergyId;
    }

    /**
     * Set medicId
     *
     * @param integer $medicId
     *
     * @return AllergyToMedicine
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

