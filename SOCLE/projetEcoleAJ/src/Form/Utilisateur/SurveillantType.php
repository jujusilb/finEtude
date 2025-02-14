<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Surveillant;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SurveillantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'required'   => true,
            'disabled' => false,
        ])

        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'required'   => true,
            'disabled' => false,
        ])

        ->add('password', TextType::class, [
            'label' => 'Mot de passe',
        'required'   => true,
        'disabled'=> false, 
        ])
        ->add('date_embauche', DateType::class, [])  // Correct syntax here
        ->add('poste', TelType::class, [])  // Correct syntax here
        ->add('imageFile', VichImageType::class)  // Correct usage of VichImageType
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Surveillant::class,
        ]);
    }
}
