<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Criteria
 *
 * @ORM\Table(name="criteria", indexes={@ORM\Index(name="fk_criteria_scale1_idx", columns={"scale_id"})})
 * @ORM\Entity
 */
class Criteria
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
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=false)
     */
    private $coefficient = '1';

    /**
     * @var \Scale
     *
     * @ORM\ManyToOne(targetEntity="Scale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scale_id", referencedColumnName="id")
     * })
     */
    private $scale;


}
