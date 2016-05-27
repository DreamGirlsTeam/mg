<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimetableType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginTime', TimeType::class, array(
                "label" => "Початок"
            ))
            ->add('endTime', TimeType::class, array(
                "label" => "Кінець"
            ))
            ->add('averTime', IntegerType::class, array(
                "label" => "Середній час прийому (хвилин)"
            ))
            ->add('actorId', EntityType::class, array(
                'label' => 'Особа',
                'class' => 'GuideBundle:MedicalStaff',
                'choices_as_values' => true,
                'choice_label' => 'last_name',
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\Timetable'
        ));
    }
}
