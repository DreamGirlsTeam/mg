<?php
namespace GuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * MedicalStaff controller.
 *
 *
 */
class MedicalStaffType extends AbstractType
{
    /**
     * +     * @param FormBuilderInterface $builder
     * +     * @param array $options
     * +     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, array('label' => 'Им\'я'))
            ->add('last_name', TextType::class, array('label' => 'Прізвище'))
            ->add('patronymic', TextType::class, array('label' => 'По-батькові'))
            ->add('date_of_birth', BirthdayType::class, array('label' => 'Дата народження'))
            ->add('specialization', TextType::class, array('label' => 'Посада'))
            ->add('phone_number', TextType::class, array('label' => 'Номер телефону'))
            ->add('email', EmailType::class, array('label' => 'Електронна пошта'));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuideBundle\Entity\MedicalStaff'));
    }
}