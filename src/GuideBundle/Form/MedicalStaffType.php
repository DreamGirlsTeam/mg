<?php

namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicalStaffType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actorId')
            ->add('first_name')
            ->add('last_name')
            ->add('patronymic')
<<<<<<< HEAD
<<<<<<< HEAD
            ->add('date_of_birth', 'date')
=======
            ->add('date_of_birth')
>>>>>>> bd272d0003e5310d4909a26dd413d6c0e9b69b11
=======
            ->add('date_of_birth')
>>>>>>> bd272d0003e5310d4909a26dd413d6c0e9b69b11
            ->add('specialization')
            ->add('phone_number')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\MedicalStaff'
        ));
    }
}
