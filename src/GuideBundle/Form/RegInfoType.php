<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array('label' => 'Ім\'я',  'attr' => array('class'=>'validate[required, custom[onlyLetterSp, minSize[2], maxSize[25]]]')))
            ->add('lastName', TextType::class, array('label' => 'Прізвище',  'attr' => array('class'=>'validate[required, custom[onlyLetterSp, minSize[2], maxSize[30]]')))
            ->add('patronymic', TextType::class, array('label' => 'По-батькові',  'attr' => array('class'=>'validate[custom[onlyLetterSp, minSize[2], maxSize[35]]]')))
            ->add('birthday', BirthdayType::class, array('label' => 'День Народження'))
            ->add('phone', TextType::class, array('label' => 'Номер телефону',  'attr' => array('class'=>'validate[required, custom[phone]]')))
            ->add('passport', TextType::class, array('label' => 'Паспорт',  'attr' => array('class'=>'validate[custom[passport]')))
            ->add('city', TextType::class, array('label' => 'Місто',  'attr' => array('class'=>'validate[required, custom[onlyLetterSp, minSize[2], maxSize[25]]]')))
            ->add('job', EntityType::class, array(
                'label' => 'Спеціальність',
                'class' => 'GuideBundle:Jobs',
                'choices_as_values' => true,
                'choice_label' => 'name',
            ))
            ->add('district', EntityType::class, array(
                'label' => 'Район',
                'class' => 'GuideBundle:Districs',
                'choices_as_values' => true,
                'choice_label' => 'name',
            ))
            ->add('email', TextType::class, array('label' => 'Електрона пошта',  'attr' => array('class'=>'validate[required, custom[email]')))

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
