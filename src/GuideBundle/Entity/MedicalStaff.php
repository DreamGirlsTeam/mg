<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="actorId", type="integer", unique=true)
     */
    private $actorId;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=60)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="patronymic", type="string", length=60)
     */
    private $patronymic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="date")
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="specialization", type="string", length=60)
     */
    private $specialization;

    /**
     * @var int
     *
     * @ORM\Column(name="phoneNumber", type="integer", nullable=true)
     */
    private $phoneNumber;


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
     * @param integer $actorId
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return MedicalStaff
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return MedicalStaff
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
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
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return MedicalStaff
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
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
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return MedicalStaff
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}

