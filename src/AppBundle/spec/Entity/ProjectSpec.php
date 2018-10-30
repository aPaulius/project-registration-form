<?php

declare(strict_types=1);

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Measure;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectMeasureValue;
use AppBundle\Entity\User;
use PhpSpec\ObjectBehavior;

class ProjectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Project::class);
    }

    function it_should_get_total_rate(
        ProjectMeasureValue $projectMeasureValue1,
        ProjectMeasureValue $projectMeasureValue2
    ) {
        $this->addProjectMeasureValue($projectMeasureValue1);
        $this->addProjectMeasureValue($projectMeasureValue2);

        $projectMeasureValue1->getRate()->shouldBeCalled()->willReturn(20);
        $projectMeasureValue2->getRate()->shouldBeCalled()->willReturn(30);

        $this->getTotalRate()->shouldReturn(50);
    }

    function it_should_set_user(User $user)
    {
        $this->setUser($user);
        $this->getUser()->shouldReturn($user);
    }

    function it_should_set_measure(Measure $measure)
    {
        $this->setMeasure($measure);
        $this->getMeasure()->shouldReturn($measure);
    }

    function it_should_add_project_measure_value(
        ProjectMeasureValue $projectMeasureValue
    ) {
        $this->addProjectMeasureValue($projectMeasureValue);

        $this->getProjectMeasureValues()->first()->shouldReturn($projectMeasureValue);
    }

    function it_should_clear_project_measure_values(
        ProjectMeasureValue $projectMeasureValue
    ) {
        $this->addProjectMeasureValue($projectMeasureValue);
        $this->getProjectMeasureValues()->count()->shouldReturn(1);

        $this->clearProjectMeasureValues();
        $this->getProjectMeasureValues()->count()->shouldReturn(0);
    }

    function it_should_set_created_at(\DateTime $createdAt)
    {
        $this->setCreatedAt($createdAt);
        $this->getCreatedAt()->shouldReturn($createdAt);
    }
}
