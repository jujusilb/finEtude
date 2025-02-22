<?php

namespace App\Form\CDI;

use App\Entity\CDI\StatutEmprunt;
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

            ->add('statut', EntityType::class, [
                'class' => StatutEmprunt::class,
                'choice_label'=>'libelle',
                ],
            )
            ->add('membre_id', HiddenType::class, [
                'mapped'=>false,
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
