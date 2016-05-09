<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class VisitsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class, array(
                'class' => 'GuideBundle:VisitTypes',
                'label' => 'Тип візиту',
                'choices_as_values' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => false
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Далі'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\Visits'
        ));
    }
}
