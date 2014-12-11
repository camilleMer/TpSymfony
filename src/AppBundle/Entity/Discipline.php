<?php

namespace AppBundle\Entity;

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
     * @ORM\ManyToMany(targetEntity="Class", inversedBy="discipline")
     * @ORM\JoinTable(name="class_discipline",
     *   joinColumns={
     *     @ORM\JoinColumn(name="discipline_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="class_id", referencedColumnName="id")
     *   }
     * )
     */
    private $class;

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
        $this->class = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teacher = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
