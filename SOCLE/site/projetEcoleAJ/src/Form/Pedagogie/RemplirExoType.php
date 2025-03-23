<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Eleve;
use App\Entity\Pedagogie\Exercice;
use App\Entity\Pedagogie\RemplirExo;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemplirExoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('note')
            ->add('eleves', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('exercices', EntityType::class, [
                'class' => Exercice::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RemplirExo::class,
        ]);
    }
}
