<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointments
 *
 * @ORM\Table(name="appointments")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\AppointmentsRepository")
 */
class Appointments
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity="Actors", inversedBy="Appointments")
     * @ORM\JoinColumn(name="docId", referencedColumnName="id")
     */
    private $docId;

    /**
     * @ORM\ManyToOne(targetEntity="Actors", inversedBy="Appointments")
     * @ORM\JoinColumn(name="patId", referencedColumnName="id")
     */
    private $patId;

    /**
     * @ORM\ManyToOne(targetEntity="VisitTypes", inversedBy="Appointments")
     * @ORM\JoinColumn(name="visitType", referencedColumnName="id")
     */
    private $visitType;

    /**
     * @var string
     *
     * @ORM\Column(name="patName", type="string", length=25, nullable=true)
     */
    private $patName;


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
     * @return Appointments
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
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Appointments
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set docId
     *
     * @param integer $docId
     *
     * @return Appointments
     */
    public function setDocId($docId)
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * Get docId
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
     * @return Appointments
     */
    public function setPatId($patId)
    {
        $this->patId = $patId;

        return $this;
    }

    /**
     * Get patId
     *
     */
    public function getPatId()
    {
        return $this->patId;
    }

    /**
     * Set visitType
     *
     * @param integer $visitType
     *
     * @return Appointments
     */
    public function setVisitType($visitType)
    {
        $this->visitType = $visitType;

        return $this;
    }

    /**
     * Get visitType
     *
     */
    public function getVisitType()
    {
        return $this->visitType;
    }

    /**
     * Set patName
     *
     * @param string $patName
     *
     * @return Appointments
     */
    public function setPatName($patName)
    {
        $this->patName = $patName;

        return $this;
    }

    /**
     * Get patName
     *
     * @return string
     */
    public function getPatName()
    {
        return $this->patName;
    }
}

