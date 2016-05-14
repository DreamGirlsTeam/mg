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

    /**
     * Population constructor.
     * @param $size
     */
    public function __construct()
    {
        $this->size = 10;
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