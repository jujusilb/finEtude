<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Vich\UploaderBundle\Form\Type\VichImageType;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
->add('jetonRepas', integerType::class,[
    'label'=>'Nombre de jeton-repas',
    'attr'=>[
        'aria-label'=>'Nombre de jeton-repas',
        'placeholder'=>'Nombre de jeton-repas'
    ],
])
        ->add('password', TextType::class, [
            'label' => 'Mot de passe',
            'attr' =>[
                'aria-label' => 'Mot de passe',
                'placeholder' => 'Mot de passe'
            ],
            'required'   => true,
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
