<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Cuisine;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Vich\UploaderBundle\Form\Type\VichImageType;
class CuisineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [])
        ->add('prenom', TextType::class, [])
        ->add('username', TextType::class, [])
        ->add('email', TextType::class, [])
        ->add('motDePasse', PasswordType::class, [
            'label' => 'Mot de passe',
            'mapped'=>false,
            'attr' =>[
                'aria-label' => 'Mot de passe',
                'placeholder' => 'Mot de passe'
            ],
            'required' => $options['validation_groups'] !== ['edition'],
            'disabled'=> false, 
        ])

        ->add('roles', ChoiceType::class, [
            'choices' => [
                'ROLE_USER' => 'ROLE_USER',
                'ROLE_ADMIN' => 'ROLE_ADMIN',
            ],
            'multiple' => true,  // Allow multiple roles to be selected
            'expanded' => true,   // Use checkboxes to select multiple roles
        ])
        ->add('date_embauche', DateType::class, [])  // Correct syntax here
        ->add('poste', TelType::class, [])  // Correct syntax here            
        ->add('imageFile', VichImageType::class, [
            'required'=>false
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cuisine::class,
        ]);
    }
}
