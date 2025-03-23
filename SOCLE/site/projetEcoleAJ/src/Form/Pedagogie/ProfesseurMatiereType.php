<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Matiere;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Entity\Pedagogie\Promotion;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesseurMatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
        ->add('Professeur', EntityType::class, [
                'class' => Professeur::class,
                'choice_label' => function(Professeur $professeur) {
                    return $professeur->getPrenom() . ' ' . $professeur->getNom(); // Afficher le prénom et le nom
                }])
        
            ->add('Matiere', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfesseurMatiere::class,
        ]);
    }
}
