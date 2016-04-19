<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timetable
 *
 * @ORM\Table(name="timetable")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\TimetableRepository")
 */
class Timetable
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
    private $actorID;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginTime", type="time")
     */
    private $beginTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="time")
     */
    private $endTime;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set actorID
     *
     * @param integer $actorID
     *
     * @return Timetable
     */
    public function setActorID($actorID)
    {
        $this->actorID = $actorID;
    
        return $this;
    }

    /**
     * Get actorID
     *
     * @return integer
     */
    public function getActorID()
    {
        return $this->actorID;
    }

    /**
     * Set beginTime
     *
     * @param \DateTime $beginTime
     *
     * @return Timetable
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    
        return $this;
    }

    /**
     * Get beginTime
     *
     * @return \DateTime
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Timetable
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }
}

