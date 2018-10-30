<?php

declare(strict_types=1);

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Measure;
use AppBundle\Entity\MeasureValue;
use PhpSpec\ObjectBehavior;

class MeasureSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Measure::class);
    }

    function it_should_add_measure_value(MeasureValue $measureValue)
    {
        $this->addMeasureValue($measureValue);

        $this->getMeasureValues()->first()->shouldReturn($measureValue);
    }
}
