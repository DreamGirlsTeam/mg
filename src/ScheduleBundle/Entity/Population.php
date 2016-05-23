<?php
/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 14.05.2016
 * Time: 20:19
 */

namespace ScheduleBundle\Entity;
use ScheduleBundle\Entity\Individ;


/**
 * Class Population
 * @package ScheduleBundle\Entity
 */
class Population
{
    /**
     * @var
     */
    public $individs;

    public $size;

    public $maxMorLength;

    public $maxEvLength;

    /**
     * Population constructor.
     * @param $size
     */
    public function __construct()
    {
        $this->size = 10;
    }


    public function getMaxMorLength()
    {
        $max = 0;
        foreach ($this->getIndivids() as $individ) {
            if ($individ->getMorNumOfPat() > $max) {
                $max = $individ->getMorNumOfPat();
            }
        }
        $this->maxMorLength = $max;
    }

    public function getMaxEvLength()
    {
        $max = 0;
        foreach ($this->getIndivids() as $individ) {
            if ($individ->getEvNumOfPat() > $max) {
                $max = $individ->getEvNumOfPat();
            }
        }
        $this->maxEvLength = $max;
    }
    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getIndivids()
    {
        return $this->individs;
    }

    /**
     * @param mixed $schedules
     */
    public function addIndivid(Individ $individ)
    {
        $this->individs[] = $individ;
    }
}