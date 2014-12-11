<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assessment
 *
 * @ORM\Table(name="assessment", indexes={@ORM\Index(name="fk_assessment_period1_idx", columns={"period_id"}), @ORM\Index(name="fk_assessment_discipline1_idx", columns={"discipline_id"})})
 * @ORM\Entity
 */
class Assessment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=45, nullable=true)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=true)
     */
    private $coefficient;

    /**
     * @var string
     *
     * @ORM\Column(name="assessment_date", type="string", length=45, nullable=true)
     */
    private $assessmentDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var \Period
     *
     * @ORM\ManyToOne(targetEntity="Period")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="period_id", referencedColumnName="id")
     * })
     */
    private $period;

    /**
     * @var \Discipline
     *
     * @ORM\ManyToOne(targetEntity="Discipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     * })
     */
    private $discipline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classroom", mappedBy="assessment")
     */
    private $classroom;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classroom = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Assessment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Assessment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set coefficient
     *
     * @param integer $coefficient
     * @return Assessment
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * Get coefficient
     *
     * @return integer 
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Set assessmentDate
     *
     * @param string $assessmentDate
     * @return Assessment
     */
    public function setAssessmentDate($assessmentDate)
    {
        $this->assessmentDate = $assessmentDate;

        return $this;
    }

    /**
     * Get assessmentDate
     *
     * @return string 
     */
    public function getAssessmentDate()
    {
        return $this->assessmentDate;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Assessment
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Assessment
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set period
     *
     * @param \Estei\NotatorBundle\Entity\Period $period
     * @return Assessment
     */
    public function setPeriod(\Estei\NotatorBundle\Entity\Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \Estei\NotatorBundle\Entity\Period 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set discipline
     *
     * @param \Estei\NotatorBundle\Entity\Discipline $discipline
     * @return Assessment
     */
    public function setDiscipline(\Estei\NotatorBundle\Entity\Discipline $discipline = null)
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * Get discipline
     *
     * @return \Estei\NotatorBundle\Entity\Discipline 
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Add classroom
     *
     * @param \Estei\NotatorBundle\Entity\Classroom $classroom
     * @return Assessment
     */
    public function addClassroom(\Estei\NotatorBundle\Entity\Classroom $classroom)
    {
        $this->classroom[] = $classroom;

        return $this;
    }

    /**
     * Remove classroom
     *
     * @param \Estei\NotatorBundle\Entity\Classroom $classroom
     */
    public function removeClassroom(\Estei\NotatorBundle\Entity\Classroom $classroom)
    {
        $this->classroom->removeElement($classroom);
    }

    /**
     * Get classroom
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }
}
