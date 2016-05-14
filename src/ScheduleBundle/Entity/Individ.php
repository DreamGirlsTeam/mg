<?php
/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 14.05.2016
 * Time: 18:25
 */

namespace ScheduleBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use ScheduleBundle\Entity\Patient;


class Individ
{
    /**
     * @var array
     */
    public $patients;

    /**
     * @var int
     */
    public $morTime;

    /**
     * @var int
     */
    public $evTime;

    /**
     * @var int
     */
    public $numOfPat;

    /**
     * @var int
     */
    public $morNumOfPat;

    /**
     * @var int
     */
    public $evNumOfPat;

    /**
     * @var int
     */
    public $queueTime;

    /**
     * @var int
     */
    public $averQueueTime;

    /**
     * @var int
     */
    public $lunchPos;

    /**
     * @return int
     */
    public function getLunchPos()
    {
        return $this->lunchPos;
    }

    /**
     * @param int $lunchPos
     */
    public function setLunchPos($lunchPos)
    {
        $this->lunchPos = $lunchPos;
    }

    public function __construct()
    {
        $this->patients = new ArrayCollection();
        $this->lunchPos = 9;
    }


    /**
     * @return array
     */
    public function getPatients()
    {
        return $this->patients;
    }

    /**
     * @param array $patients
     */
    public function add(Patient $patients)
    {
        $this->patients[] = $patients;
    }

    /**
     * @return int
     */
    public function getMorTime()
    {
        return $this->morTime;
    }

    /**
     * @param int $morTime
     */
    public function setMorTime($morTime)
    {
        $this->morTime = $morTime;
    }

    /**
     * @return int
     */
    public function getEvTime()
    {
        return $this->evTime;
    }

    /**
     * @param int $evTime
     */
    public function setEvTime($evTime)
    {
        $this->evTime = $evTime;
    }

    /**
     * @return int
     */
    public function getNumOfPat()
    {
        return $this->numOfPat;
    }

    /**
     * @param int $numOfPat
     */
    public function setNumOfPat($numOfPat)
    {
        $this->numOfPat = $numOfPat;
    }

    /**
     * @return int
     */
    public function getMorNumOfPat()
    {
        return $this->morNumOfPat;
    }

    /**
     * @param int $morNumOfPat
     */
    public function setMorNumOfPat($morNumOfPat)
    {
        $this->morNumOfPat = $morNumOfPat;
    }

    /**
     * @return int
     */
    public function getEvNumOfPat()
    {
        return $this->evNumOfPat;
    }

    /**
     * @param int $evNumOfPat
     */
    public function setEvNumOfPat($evNumOfPat)
    {
        $this->evNumOfPat = $evNumOfPat;
    }

    /**
     * @return int
     */
    public function getQueueTime()
    {
        return $this->queueTime;
    }

    /**
     * @param int $queueTime
     */
    public function setQueueTime($queueTime)
    {
        $this->queueTime = $queueTime;
    }

    /**
     * @return int
     */
    public function getAverQueueTime()
    {
        return $this->averQueueTime;
    }

    /**
     * @param int $averQueueTime
     */
    public function setAverQueueTime($averQueueTime)
    {
        $this->averQueueTime = $averQueueTime;
    }


}