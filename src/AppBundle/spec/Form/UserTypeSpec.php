<?php

declare(strict_types=1);

namespace spec\AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UserType::class);
        $this->shouldHaveType(AbstractType::class);
    }

    function it_should_build_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Vardas',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Pavardė',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('address', TextType::class, [
                'label' => 'Adresas',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('email', EmailType::class, [
                'label' => 'El. paštas',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('phone', TelType::class, [
                'label' => 'Telefonas',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('houseNumber', IntegerType::class, [
                'label' => 'Namo numeris',
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $builder
            ->add('hasCompensation', CheckboxType::class, [
                'label' => 'Ar esate gavęs kompensacinę išmoką pagal Klimato kaitos specialiąją programą?',
                'required' => false,
            ])
            ->shouldBeCalled()
            ->willReturn($builder);

        $this->buildForm($builder, []);
    }

    function it_should_configure_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ])->shouldBeCalled();

        $this->configureOptions($resolver);
    }
}
