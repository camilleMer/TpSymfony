<?php

namespace AppBundle\Entity;

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
     * @ORM\ManyToMany(targetEntity="Class", mappedBy="assessment")
     */
    private $class;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->class = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
