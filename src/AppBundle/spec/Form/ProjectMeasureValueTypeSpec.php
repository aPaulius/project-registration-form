<?php

declare(strict_types=1);

namespace spec\AppBundle\Form;

use AppBundle\Entity\ProjectMeasureValue;
use AppBundle\Form\ProjectMeasureValueType;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectMeasureValueTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectMeasureValueType::class);
        $this->shouldHaveType(AbstractType::class);
    }

    function it_should_build_form(FormBuilderInterface $builder)
    {
        $builder->add('value')->shouldBeCalled();

        $this->buildForm($builder, []);
    }

    function it_should_configure_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProjectMeasureValue::class
        ])->shouldBeCalled();

        $this->configureOptions($resolver);
    }
}
