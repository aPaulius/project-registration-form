<?php

declare(strict_types=1);

namespace spec\AppBundle\Entity;

use AppBundle\Entity\MeasureValue;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectMeasureValue;
use PhpSpec\ObjectBehavior;

class ProjectMeasureValueSpec extends ObjectBehavior
{
    function let(MeasureValue $measureValue)
    {
        $this->beConstructedWith($measureValue);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectMeasureValue::class);
    }

    function it_should_get_name(MeasureValue $measureValue)
    {
        $this->setMeasureValue($measureValue);
        $measureValue->getName()->shouldBeCalled()->willReturn('name');

        $this->getName()->shouldReturn('name');
    }

    function it_should_get_rate(MeasureValue $measureValue)
    {
        $this->setMeasureValue($measureValue);
        $measureValue->getRate()->shouldBeCalled()->willReturn(20);

        $this->getRate()->shouldReturn(20);
    }

    function it_should_set_value()
    {
        $this->setValue(20.20);
        $this->getValue()->shouldReturn(20.20);
    }

    function it_should_measure_value(MeasureValue $measureValue)
    {
        $this->setMeasureValue($measureValue);
        $this->getMeasureValue()->shouldReturn($measureValue);
    }

    function it_should_set_project(Project $project)
    {
        $this->setProject($project);
        $this->getProject()->shouldReturn($project);
    }
}
