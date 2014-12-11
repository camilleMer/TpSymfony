<?php

namespace AppBundle\Entity;

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


}
