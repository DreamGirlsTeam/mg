<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfPerson
 *
 * @ORM\Table(name="conf_person")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\ConfPersonRepository")
 */
class ConfPerson
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @ORM\ManyToOne(targetEntity="Actors")
//     * @ORM\JoinColumn(name="actorId", referencedColumnName="id")
//     */
    /**
     * @var int
     *
     * @ORM\Column(name="actorId", type="integer")
     */
    private $actorId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $first_name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=60)
     */
    private $last_name;

    /**
     * @var string
     *
     * @ORM\Column(name="patronymic", type="string", length=60, nullable=true)
     */
    private $patronymic;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="string", length=20)
     */
    private $phone_number;


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
     * Set actorId
     *
     * @param $actorId
     *
     * @return ConfPerson
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;

        return $this;
    }

    /**
     * Get actorId
     *
     */
    public function getActorId()
    {
        return $this->actorId;
    }

    /**
     * Set FirstName
     *
     * @param string $first_name
     *
     * @return ConfPerson
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get FirstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return ConfPerson
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set patronymic
     *
     * @param string $patronymic
     *
     * @return ConfPerson
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phone_number
     *
     * @return ConfPerson
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
}

