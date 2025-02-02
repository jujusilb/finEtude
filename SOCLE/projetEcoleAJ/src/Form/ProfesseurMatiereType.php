<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Professeur;
use App\Entity\ProfesseurMatiere;
use App\Entity\Promotion;
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
