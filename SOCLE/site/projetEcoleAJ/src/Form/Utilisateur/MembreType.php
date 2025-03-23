<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Vich\UploaderBundle\Form\Type\VichImageType;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('civilite', ChoiceType::class, [
            "label"=>'civilité',
            'attr'=>[
                'aria-label'=>'civilité',
            ],
            'choices'=> [
                'Monsieur'=>'Monsieur',
                'Madame'=>'Madame',
            ],
            'required'=>true,
            'expanded'=>true
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' =>[
                'aria-label' => 'Nom',
                'placeholder' => 'Nom'
            ],
            'required'   => true,
            'disabled' => false,
           
        ])

        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'attr' =>[
                'placeholder' => 'Prénom',
                'aria-label' => 'Prénom'
            ],
            'required'   => true,
            'disabled' => false,
            
        ])

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
        ->add('imageFile', VichImageType::class, [
            'required'=>false
        ])
/*
            ->add('email')
            ->add('roles')
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])

            ->add('username')
            ->add('charte')
*/      ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
