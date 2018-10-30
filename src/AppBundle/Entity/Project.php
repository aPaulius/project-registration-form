<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class Project
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $user;

    /**
     * @Assert\NotBlank(message="Pasirinkite priemonę")
     */
    private $measure;

    /**
     * @ORM\OneToMany(
     *     targetEntity="ProjectMeasureValue",
     *     mappedBy="project",
     *     cascade={"persist"}
     * )
     * @Assert\Valid()
     */
    private $projectMeasureValues;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Pasirinkite pildymo datą")
     */
    private $createdAt;

    public function __construct()
    {
        $this->projectMeasureValues = new ArrayCollection();
    }

    public function getQrCode(): string
    {
        return sprintf('%s', $this->getId());
    }

    public function getTotalRate()
    {
        $total = 0;

        foreach ($this->getProjectMeasureValues() as $measure) {
            $total += $measure->getRate();
        }

        return $total;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getMeasure(): ?Measure
    {
        return $this->measure;
    }

    public function setMeasure(Measure $measure)
    {
        $this->measure = $measure;
    }

    public function getProjectMeasureValues(): ?Collection
    {
        return $this->projectMeasureValues;
    }

    public function addProjectMeasureValue(ProjectMeasureValue $projectMeasureValue)
    {
        $projectMeasureValue->setProject($this);
        $this->projectMeasureValues->add($projectMeasureValue);
    }

    public function clearProjectMeasureValues()
    {
        $this->projectMeasureValues->clear();
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}