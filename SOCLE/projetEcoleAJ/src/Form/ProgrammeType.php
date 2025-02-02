<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Professeur;
use App\Entity\Programme;
use App\Entity\Promotion;
use App\Entity\ProfesseurMatiere;
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
