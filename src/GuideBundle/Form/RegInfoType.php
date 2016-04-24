<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use GuideBundle\Entity\Districs;
use GuideBundle\Entity\Jobs;

class RegInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('job', EntityType::class, array(
                'class' => 'GuideBundle:Jobs',
                'choices_as_values' => true,
                'choice_label' => 'name',
            ))
            ->add('district', EntityType::class, array(
                'class' => 'GuideBundle:Districs',
                'choices_as_values' => true,
                'choice_label' => 'name',
            ))
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('birthday')
            ->add('phone')
            ->add('passport')
            ->add('city')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\RegInfo'
        ));
    }
}
