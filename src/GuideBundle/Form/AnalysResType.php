<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Tests\Extension\Core\Type\SubmitTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnalysResType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, array(
                'label' => 'Назва аналізу',
                'class' => 'GuideBundle:Analysis',
                'choices_as_values' => true,
                'choice_label' => 'name',
            ))
            ->add('patId', EntityType::class, array(
                'label' => 'Номер пацієнта',
                'class' => 'GuideBundle:RegInfo',
                'choices_as_values' => true,
                'choice_label' => 'actorId.id',
            ))
            ->add('filename', FileType::class, array(
            	'label' => 'Файл'
            	) )
            ->add('sub', SubmitType::class, array(
                'label' => 'Додати'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\AnalysRes'
        ));
    }
}
