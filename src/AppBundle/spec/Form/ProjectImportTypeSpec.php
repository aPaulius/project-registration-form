<?php

declare(strict_types=1);

namespace spec\AppBundle\Form;

use AppBundle\Form\ProjectImportType;
use AppBundle\Model\ProjectImport;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectImportTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectImportType::class);
        $this->shouldHaveType(AbstractType::class);
    }

    function it_should_build_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'Projekto PDF',
            ])
            ->shouldBeCalled();

        $this->buildForm($builder, []);
    }

    function it_should_configure_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProjectImport::class
        ])->shouldBeCalled();

        $this->configureOptions($resolver);
    }
}
