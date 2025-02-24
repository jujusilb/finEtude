<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Matiere;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\Programme;
use App\Entity\Pedagogie\Promotion;
use App\Entity\Pedagogie\ProfesseurMatiere;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgrammeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('professeur', EntityType::class, [
                'class' => Professeur::class,
                'choice_label' => function (Professeur $professeur){
                    return $professeur->getPrenom().
                    ' '.
                    $professeur->getNom();
                }]
            )
            
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
                    'choice_label' => function (Matiere $matiere){
                        return $matiere->getLibelle();
                    }]
                )
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                    'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Programme::class,
        ]);
    }
}
