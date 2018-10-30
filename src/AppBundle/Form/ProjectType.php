<?php

declare(strict_types=1);

namespace AppBundle\Form;

use AppBundle\Entity\Measure;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectMeasureValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', UserType::class)
            ->add('measure', EntityType::class, array(
                'class' => Measure::class,
                'label' => 'Priemonė',
                'placeholder' => '',
            ))
            ->add('createdAt', DateType::class, [
                'label' => 'Pildymo data',
                'data' => new \DateTime(),
                'widget' => 'single_text',
            ])
        ;

        $formModifier = function (FormInterface $form) {
            $form->add('projectMeasureValues', CollectionType::class, [
                'entry_type' => ProjectMeasureValueType::class,
                'label' => false,
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $formModifier($event->getForm());
            }
        );

        $builder->get('measure')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $project = $event->getForm()->getParent()->getData();
                $measure = $event->getForm()->getData();

                if ($measure) {
                    foreach ($measure->getMeasureValues() as $measureValue) {
                        $projectMeasureValue = new ProjectMeasureValue($measureValue);
                        $project->addProjectMeasureValue($projectMeasureValue);
                    }
                } else {
                    $project->clearProjectMeasureValues();
                }

                $formModifier($event->getForm()->getParent());
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
