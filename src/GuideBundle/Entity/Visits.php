<?php

namespace GuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visits
 *
 * @ORM\Table(name="visits")
 * @ORM\Entity(repositoryClass="GuideBundle\Repository\VisitsRepository")
 */
class Visits
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="docId", type="integer")
     */
    private $docId;

    /**
     * @var int
     *
     * @ORM\Column(name="patId", type="integer")
     */
    private $patId;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * @return Visits
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
     * Set docId
     *
     * @param integer $docId
     *
     * @return Visits
     */
    public function setDocId($docId)
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * Get docId
     *
     * @return int
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
     * @return Visits
     */
    public function setPatId($patId)
    {
        $this->patId = $patId;

        return $this;
    }

    /**
     * Get patId
     *
     * @return int
     */
    public function getPatId()
    {
        return $this->patId;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Visits
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Visits
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}

