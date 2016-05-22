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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\Column(name="beginTime", type="time")
     */
    private $beginTime;

    /**
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    /**
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @ORM\Column(name="endTime", type="time")
     */
    private $endTime;

    /**
     * @ORM\Column(name="docId", type="integer")
     */
    private $docId;

    /**
     * @var string
     *
     * @ORM\Column(name="patName", type="string", length=60, nullable=true)
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
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set docId
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

