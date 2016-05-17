<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Timetable
 *
 * @ORM\Table(name="timetable")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\TimetableRepository")
 * @UniqueEntity("actorId", message="Години роботи лікаря вже зареєстровані")
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
     * @ORM\Column(name="actorId", type="integer")
     */
    private $actorId;

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
    public function setActorId($actorID)
    {
        $this->actorId = $actorID;
    
        return $this;
    }

    /**
     * Get actorID
     */
    public function getActorId()
    {
        return $this->actorId;
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

