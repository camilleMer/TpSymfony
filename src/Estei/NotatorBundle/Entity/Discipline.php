<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discipline
 *
 * @ORM\Table(name="discipline")
 * @ORM\Entity
 */
class Discipline
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classroom", inversedBy="discipline")
     * @ORM\JoinTable(name="classroom_discipline",
     *   joinColumns={
     *     @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="classroom_id", referencedColumnName="id")
     *   }
     * )
     */
    private $classroom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Teacher", inversedBy="discipline")
     * @ORM\JoinTable(name="discipline_teacher",
     *   joinColumns={
     *     @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     *   }
     * )
     */
    private $teacher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classroom = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Discipline
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
     * @return Discipline
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
     * Add classroom
     *
     * @param \Estei\NotatorBundle\Entity\Classroom $classroom
     * @return Discipline
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

    /**
     * Add teacher
     *
     * @param \Estei\NotatorBundle\Entity\Teacher $teacher
     * @return Discipline
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
