<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Visits
 *
 * @ORM\Table(name="visits")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\VisitsRepository")
 */
class Visits
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", unique=false)
     */
    private $date;

    /**
     * @ORM\Column(name="illnesses", type="text", unique=false, nullable=true)
     */
     private $illnesses;

    /**
     * @ORM\ManyToMany(targetEntity="Medicines", inversedBy="visits")
     * @ORM\JoinTable(name="visit_to_medic",
     *       joinColumns={@ORM\JoinColumn(name="visit_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="medic_id", referencedColumnName="id")})
     */
    private $medicines;

    /**
     * @ORM\ManyToOne(targetEntity="Actors")
     * @ORM\JoinColumn(name="docId", referencedColumnName="id", unique=false)
     */
    private $docId;

    /**
     * @ORM\ManyToOne(targetEntity="Actors")
     * @ORM\JoinColumn(name="patId", referencedColumnName="id", unique=false)
     */
    private $patId;

    /**
     * @ORM\Column(name="type", type="text", unique=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", unique=false)
     */
    private $comment;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Visits
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set docId
     *
     * @param integer $docId
     *
     * @return Visits
     */
    public function setDocId($docId)
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * Get docId
     *
     * @return int
     */
    public function getDocId()
    {
        return $this->docId;
    }

    /**
     * Set patId
     *
     * @param integer $patId
     *
     * @return Visits
     */
    public function setPatId($patId)
    {
        $this->patId = $patId;

        return $this;
    }

    /**
     * Get patId
     *
     * @return int
     */
    public function getPatId()
    {
        return $this->patId;
    }

    /**
     * Set type
     *
     * @param $type
     *
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Visits
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
    public function setIllnesses($illnesses)
    {
        $this->illnesses = $illnesses;
    }

    /**
     * @return mixed
     */
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

        return $this;
    }

    public function __construct()
    {
        $this->medicines = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

