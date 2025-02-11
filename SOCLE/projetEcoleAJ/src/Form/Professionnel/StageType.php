<?php

namespace App\Form\Professionnel;

use App\Entity\Professionnel\Entreprise;
use App\Entity\Professionnel\Professionnel;
use App\Entity\Professionnel\Stage;
use App\Entity\Utilisateur\Eleve;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label'=>'libelle',
            ])
            ->add('fonction', TextType::class, [])
            ->add('dateDebut', null, [
                'widget' => 'single_text'
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text'
            ])
            ->add('responsable', EntityType::class, [
                'class' => Professionnel::class,
                'choice_label' => function(Professionnel $professionnel){
                return $professionnel->getPrenom().' '.$professionnel->getNom();
                },
            ])
            ->add('stagiaire', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => function(Eleve $eleve){
                    return $eleve->getPrenom().' '.$eleve->getNom();
                    },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
