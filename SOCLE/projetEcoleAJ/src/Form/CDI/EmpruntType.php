<?php

namespace App\Form\CDI;

use App\Entity\CDI\Emprunt;
use App\Entity\Utilisateur\Membre;
use App\Entity\CDI\Ouvrage;

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
/*            
        ->add('dateDemande', DateType::class, [
                'placeholder' => [
                    'year' => 'Année',
                    'month' => 'Mois',
                    'day' => 'Jour',
                ],
                'label'=>'Date de la demande d\'emprunt',
                'attr'=>[
                    'aria-label'=>'Date de la demande d\'emprunt',
                    'class'=>'mx-auto'
                ]
            ])
*/            
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
                    'Demande' => 'Demande',
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
