<?php

namespace App\Form\Utilisateur;

use App\Entity\Boutique\MembreJeton;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\ParentEleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ParentEleveType extends AbstractType
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


            ->add('eleves', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => function (Eleve $eleve){
                    return $eleve->getPrenom().' '.$eleve->getNom();
                
                }, // ou une autre propriété de Eleve
                'multiple' => true,
                'expanded' => false, // Pour afficher les cases à cocher
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParentEleve::class,
        ]);
    }
}
