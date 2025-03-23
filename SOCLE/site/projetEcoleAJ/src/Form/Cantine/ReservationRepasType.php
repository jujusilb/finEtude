<?php

namespace App\Form\Cantine;

use App\Entity\Cantine\ReservationRepas;
use App\Entity\Cantine\Repas;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReservationRepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateAchat', DateType::class, [
            'label'=>'Choisissez la date',
            'placeholder' => [
                'year' => 'Année',
                'month' => 'Mois',
                'day' => 'Jour',
            ],
            'attr' => [
                'aria-label' => 'Choisissez la date',
                'class' => 'd-inline',
                
            ]
        ])
            ->add('repas', EntityType::class, [
                'class' => Repas::class,
                'choice_label' => function (Repas $repas){
                return $repas ->getDate()->format('Y-m-d').
                ' '. $repas ->getHeure();
            },])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReservationRepas::class,
        ]);
    }
}
