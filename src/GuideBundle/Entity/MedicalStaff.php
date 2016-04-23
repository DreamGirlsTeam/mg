<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GuideBundle\Entity\Actors;

/**
 * MedicalStaff
 *
 * @ORM\Table(name="medical_staff")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\MedicalStaffRepository")
 */
class MedicalStaff
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
     * @ORM\OneToOne(targetEntity="Actors")
     * @ORM\JoinColumn(name="actorId", referencedColumnName="id", onDelete="cascade")
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date")
     */
    private $date_of_birth;

    /**
     * @var string
     *
     * @ORM\Column(name="specialization", type="string", length=60)
     */
    private $specialization;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="string", length=20, nullable=true)
     */
    private $phone_number;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false, unique=true)
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


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
     * @return MedicalStaff
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;

        return $this;
    }

    /**
     * Get actorId
     *
     * @return int
     */
    public function getActorId()
    {
        return $this->actorId;
    }

    /**
     * Set first_name
     *
     * @param string $first_name
     *
     * @return MedicalStaff
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $last_name
     *
     * @return MedicalStaff
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get last_name
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
     * @return MedicalStaff
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
     * Set date_of_birth
     *
     * @param \DateTime $date_of_birth
     *
     * @return MedicalStaff
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    /**
     * Get date_of_birth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set specialization
     *
     * @param string $specialization
     *
     * @return MedicalStaff
     */
    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;

        return $this;
    }

    /**
     * Get specialization
     *
     * @return string
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }

    /**
     * Set phone_number
     *
     * @param integer $phone_number
     *
     * @return MedicalStaff
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get phone_number
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
}

