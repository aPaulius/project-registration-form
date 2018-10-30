<?php

declare(strict_types=1);

namespace spec\AppBundle\Entity;

use AppBundle\Entity\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    function it_should_set_first_name()
    {
        $this->setFirstName('first');
        $this->getFirstName()->shouldReturn('first');
    }

    function it_should_set_last_name()
    {
        $this->setLastName('last');
        $this->getLastName()->shouldReturn('last');
    }

    function it_should_address()
    {
        $this->setAddress('address');
        $this->getAddress()->shouldReturn('address');
    }

    function it_should_set_email()
    {
        $this->setEmail('test@email.com');
        $this->getEmail()->shouldReturn('test@email.com');
    }

    function it_set_phone()
    {
        $this->setPhone('37069999999');
        $this->getPhone()->shouldReturn('37069999999');
    }

    function it_should_set_house_number()
    {
        $this->setHouseNumber(3);
        $this->getHouseNumber()->shouldReturn(3);
    }

    function it_should_set_compensation()
    {
        $this->setHasCompensation(true);
        $this->getHasCompensation()->shouldReturn(true);
    }
}
