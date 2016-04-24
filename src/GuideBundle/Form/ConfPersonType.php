<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ConfPersonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, array('label' => '��\'�',  'attr' => array('class'=>'validate[required, custom[onlyLetterSp, minSize[2], maxSize[25]]]')))
            ->add('last_name', TextType::class, array('label' => '�������',  'attr' => array('class'=>'validate[required, custom[onlyLetterSp, minSize[2], maxSize[30]]')))
            ->add('patronymic', TextType::class, array('label' => '��-�������',  'attr' => array('class'=>'validate[custom[onlyLetterSp, minSize[2], maxSize[35]]]')))
            ->add('phone_number', TextType::class, array('label' => '����� ��������',  'attr' => array('class'=>'validate[required, custom[phone]]')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\ConfPerson'
        ));
    }
}
