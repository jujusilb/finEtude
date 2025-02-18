<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Cours;
use App\Entity\Pedagogie\Matiere;
use App\Entity\Pedagogie\Promotion;
use App\Entity\Utilisateur\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('libelle')
            ->add('fichier')
            ->add('professeur', EntityType::class, [
                'class' => Professeur::class,
'choice_label' => 'id',
            ])
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
'choice_label' => 'id',
            ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
