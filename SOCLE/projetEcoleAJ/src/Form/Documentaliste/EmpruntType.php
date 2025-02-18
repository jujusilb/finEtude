<?php

namespace App\Form\Documentaliste;

use App\Entity\Documentaliste\Emprunt;
use App\Entity\Utilisateur\Membre;
use App\Entity\Documentaliste\Ouvrage;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateEmprunt', DateType::class, [
                //'widget' => 'single_text',
                'placeholder' => [
                    'year' => 'Année',
                    'month' => 'Mois',
                    'day' => 'Jour',
                ],
                'label'=>'Date de l\'emprunt',
                'attr'=>[
                    'aria-label'=>'Date de l\'emprunt',
                    'class'=>'mx-auto'
                ]
            ])
            
            ->add('ajaxOuvrage', TextType::class, [
                'mapped'=>false,
                'label'=>'Choisissez un ouvrage',
                'attr'=>[
                    'aria-label' =>'Choisissez un ouvrage',
                    'placeholder'=>'Choisissez un ouvrage'
                ]
            ])
            ->add('ouvrage_id', HiddenType::class, [
                'mapped'=>false,
            ])

            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'En Cours' => 'En Cours',
                    'Rendu' => 'Rendu',
                ],
                'multiple' => false,  // Allow multiple roles to be selected
                'expanded' => false,   // Use checkboxes to select multiple roles
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
