<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classroom
 *
 * @ORM\Table(name="classroom")
 * @ORM\Entity
 */
class Classroom
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
     * @ORM\Column(name="level", type="string", length=45, nullable=true)
     */
    private $level;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Assessment", inversedBy="classroom")
     * @ORM\JoinTable(name="assessment_classroom",
     *   joinColumns={
     *     @ORM\JoinColumn(name="classroom_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="assessment_id", referencedColumnName="id")
     *   }
     * )
     */
    private $assessment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Discipline", mappedBy="classroom")
     */
    private $discipline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Teacher", mappedBy="classroom")
     */
    private $teacher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assessment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discipline = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teacher = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Classroom
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
     * Set level
     *
     * @param string $level
     * @return Classroom
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add assessment
     *
     * @param \Estei\NotatorBundle\Entity\Assessment $assessment
     * @return Classroom
     */
    public function addAssessment(\Estei\NotatorBundle\Entity\Assessment $assessment)
    {
        $this->assessment[] = $assessment;

        return $this;
    }

    /**
     * Remove assessment
     *
     * @param \Estei\NotatorBundle\Entity\Assessment $assessment
     */
    public function removeAssessment(\Estei\NotatorBundle\Entity\Assessment $assessment)
    {
        $this->assessment->removeElement($assessment);
    }

    /**
     * Get assessment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssessment()
    {
        return $this->assessment;
    }

    /**
     * Add discipline
     *
     * @param \Estei\NotatorBundle\Entity\Discipline $discipline
     * @return Classroom
     */
    public function addDiscipline(\Estei\NotatorBundle\Entity\Discipline $discipline)
    {
        $this->discipline[] = $discipline;

        return $this;
    }

    /**
     * Remove discipline
     *
     * @param \Estei\NotatorBundle\Entity\Discipline $discipline
     */
    public function removeDiscipline(\Estei\NotatorBundle\Entity\Discipline $discipline)
    {
        $this->discipline->removeElement($discipline);
    }

    /**
     * Get discipline
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Add teacher
     *
     * @param \Estei\NotatorBundle\Entity\Teacher $teacher
     * @return Classroom
     */
    public function addTeacher(\Estei\NotatorBundle\Entity\Teacher $teacher)
    {
        $this->teacher[] = $teacher;

        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \Estei\NotatorBundle\Entity\Teacher $teacher
     */
    public function removeTeacher(\Estei\NotatorBundle\Entity\Teacher $teacher)
    {
        $this->teacher->removeElement($teacher);
    }

    /**
     * Get teacher
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
