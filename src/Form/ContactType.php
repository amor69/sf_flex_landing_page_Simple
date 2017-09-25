<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 25/09/17
 * Time: 09:40
 */

namespace App\Form;


use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Nom'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Enregistrer']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'Contact';
    }
}