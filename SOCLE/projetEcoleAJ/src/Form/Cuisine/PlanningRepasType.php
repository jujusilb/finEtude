<?php

namespace App\Form\Cuisine;

use App\Entity\Cuisine\PlanningRepas;
use App\Entity\Cuisine\Repas;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningRepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateAchat', null, [
                'widget' => 'single_text'
            ])
            ->add('repas', EntityType::class, [
                'class' => Repas::class,
                'choice_label' => function (Repas $repas){
                return $repas ->getDate()->format('Y-m-d').
                ' '. $repas ->getHeure();
            },])
            /*
            ->add('membre', EntityType::class, [
                'class' => Membre::class,
                'choice_label' => function (Membre $membre){
                    return $membre->getPrenom().' '.$membre->getNom();
                },
            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlanningRepas::class,
        ]);
    }
}
