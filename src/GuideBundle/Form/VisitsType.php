<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use GuideBundle\Entity\VisitTypes;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


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
                'choices_as_values' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => false
            ))
            ->add('comment')
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