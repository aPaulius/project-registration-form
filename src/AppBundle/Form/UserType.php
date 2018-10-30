<?php

declare(strict_types=1);

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Vardas',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Pavardė',
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresas',
            ])
            ->add('email', EmailType::class, [
                'label' => 'El. paštas',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Telefonas',
            ])
            ->add('houseNumber', IntegerType::class, [
                'label' => 'Namo numeris',
            ])
            ->add('hasCompensation', CheckboxType::class, [
                'label' => 'Ar esate gavęs kompensacinę išmoką pagal Klimato kaitos specialiąją programą?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
