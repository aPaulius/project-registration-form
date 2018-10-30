<?php

declare(strict_types=1);

namespace spec\AppBundle\Form;

use AppBundle\Entity\Measure;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use AppBundle\Form\UserType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectType::class);
        $this->shouldHaveType(AbstractType::class);
    }

    function it_should_build_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('user', UserType::class)
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('measure', EntityType::class, array(
                'class' => Measure::class,
                'label' => 'Priemonė',
                'placeholder' => '',
            ))
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('createdAt', DateType::class, Argument::type('array'))
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, Argument::type(\Closure::class))
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder->get('measure')->shouldBeCalled()->willReturn($builder);

        $builder
            ->addEventListener(FormEvents::POST_SUBMIT, Argument::type(\Closure::class))
            ->shouldBeCalled();

        $this->buildForm($builder, []);
    }

    function it_should_configure_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class
        ])->shouldBeCalled();

        $this->configureOptions($resolver);
    }
}
