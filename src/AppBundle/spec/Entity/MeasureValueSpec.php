<?php

declare(strict_types=1);

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Measure;
use AppBundle\Entity\MeasureValue;
use PhpSpec\ObjectBehavior;

class MeasureValueSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('name', 20);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MeasureValue::class);
    }

    function it_should_set_name()
    {
        $this->setName('measure name');
        $this->getName()->shouldReturn('measure name');
    }

    function it_should_set_rate()
    {
        $this->setRate(30);
        $this->getRate()->shouldReturn(30);
    }

    function it_should_set_measure(Measure $measure)
    {
        $this->setMeasure($measure);
        $this->getMeasure()->shouldReturn($measure);
    }
}
