<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentAssessmentCriteria
 *
 * @ORM\Table(name="student_assessment_criteria", indexes={@ORM\Index(name="fk_student_assessment_criteria_criteria1_idx", columns={"criteria_id"}), @ORM\Index(name="fk_student_assessment_criteria_student1_idx", columns={"student_id"}), @ORM\Index(name="fk_student_assessment_criteria_assessment1_idx", columns={"assessment_id"})})
 * @ORM\Entity
 */
class StudentAssessmentCriteria
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
     * @var integer
     *
     * @ORM\Column(name="mark", type="integer", nullable=true)
     */
    private $mark;

    /**
     * @var \Criteria
     *
     * @ORM\ManyToOne(targetEntity="Criteria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criteria_id", referencedColumnName="id")
     * })
     */
    private $criteria;

    /**
     * @var \Student
     *
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * })
     */
    private $student;

    /**
     * @var \Assessment
     *
     * @ORM\ManyToOne(targetEntity="Assessment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assessment_id", referencedColumnName="id")
     * })
     */
    private $assessment;



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
     * Set mark
     *
     * @param integer $mark
     * @return StudentAssessmentCriteria
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return integer 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set criteria
     *
     * @param \Estei\NotatorBundle\Entity\Criteria $criteria
     * @return StudentAssessmentCriteria
     */
    public function setCriteria(\Estei\NotatorBundle\Entity\Criteria $criteria = null)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * Get criteria
     *
     * @return \Estei\NotatorBundle\Entity\Criteria 
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Set student
     *
     * @param \Estei\NotatorBundle\Entity\Student $student
     * @return StudentAssessmentCriteria
     */
    public function setStudent(\Estei\NotatorBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Estei\NotatorBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set assessment
     *
     * @param \Estei\NotatorBundle\Entity\Assessment $assessment
     * @return StudentAssessmentCriteria
     */
    public function setAssessment(\Estei\NotatorBundle\Entity\Assessment $assessment = null)
    {
        $this->assessment = $assessment;

        return $this;
    }

    /**
     * Get assessment
     *
     * @return \Estei\NotatorBundle\Entity\Assessment 
     */
    public function getAssessment()
    {
        return $this->assessment;
    }
}
