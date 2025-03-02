<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


use Vich\UploaderBundle\Form\Type\VichImageType;

class AdminType extends AbstractType
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
            ;
        
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
