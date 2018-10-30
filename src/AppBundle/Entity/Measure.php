<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class Measure
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="MeasureValue", mappedBy="measure", cascade={"persist"})
     */
    private $measureValues;

    public function __construct(string $name)
    {
        $this->measureValues = new ArrayCollection();
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeasureValues(): Collection
    {
        return $this->measureValues;
    }

    public function addMeasureValue(MeasureValue $measureValue)
    {
        $measureValue->setMeasure($this);
        $this->measureValues->add($measureValue);
    }
}