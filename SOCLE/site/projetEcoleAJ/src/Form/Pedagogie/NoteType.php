<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Exercice;
use App\Entity\Pedagogie\Matiere;
use App\Entity\Pedagogie\Note;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
            ->add('libelle')
            ->add('coefficient')
            ->add('eleve', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => function (Eleve $eleve){
                    return $eleve->getPrenom().' '.$eleve->getNom();
                    },
            ])
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'libelle',
            ])
            ->add('exercice', EntityType::class, [
                'class' => Exercice::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
