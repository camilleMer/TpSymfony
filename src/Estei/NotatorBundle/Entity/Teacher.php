<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher", indexes={@ORM\Index(name="fk_teacher_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Teacher
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classroom", inversedBy="teacher")
     * @ORM\JoinTable(name="classroom_teacher",
     *   joinColumns={
     *     @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="Discipline", mappedBy="teacher")
     */
    private $discipline;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classroom = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discipline = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user
     *
     * @param \Estei\NotatorBundle\Entity\User $user
     * @return Teacher
     */
    public function setUser(\Estei\NotatorBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Estei\NotatorBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add classroom
     *
     * @param \Estei\NotatorBundle\Entity\Classroom $classroom
     * @return Teacher
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
     * Add discipline
     *
     * @param \Estei\NotatorBundle\Entity\Discipline $discipline
     * @return Teacher
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
}
