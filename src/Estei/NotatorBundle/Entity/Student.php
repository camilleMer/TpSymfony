<?php

namespace Estei\NotatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student", indexes={@ORM\Index(name="fk_student_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_student_class1_idx", columns={"classroom_id"})})
 * @ORM\Entity
 */
class Student
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
     * @var \Classroom
     *
     * @ORM\ManyToOne(targetEntity="Classroom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classroom_id", referencedColumnName="id")
     * })
     */
    private $classroom;



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
     * @return Student
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
     * Set classroom
     *
     * @param \Estei\NotatorBundle\Entity\Classroom $classroom
     * @return Student
     */
    public function setClassroom(\Estei\NotatorBundle\Entity\Classroom $classroom = null)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get classroom
     *
     * @return \Estei\NotatorBundle\Entity\Classroom 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }
}
