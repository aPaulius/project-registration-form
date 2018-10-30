<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class ProjectMeasureValue
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Įveskite priemonės apimtį")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="MeasureValue")
     * @ORM\JoinColumn(name="measure_value_id", referencedColumnName="id")
     */
    private $measureValue;

    /**
     * @ORM\ManyToOne(targetEntity="project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    public function __construct(MeasureValue $measureValue)
    {
        $this->measureValue = $measureValue;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->getMeasureValue()->getName();
    }

    public function getRate(): int
    {
        return $this->getMeasureValue()->getRate();
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value)
    {
        $this->value = $value;
    }

    public function getMeasureValue(): ?MeasureValue
    {
        return $this->measureValue;
    }

    public function setMeasureValue(MeasureValue $measureValue)
    {
        $this->measureValue = $measureValue;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
    }
}