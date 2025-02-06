<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Professeur;
use App\Entity\Pedagogie\Referent;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReferentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('professeur', EntityType::class, [
            'class' => Professeur::class,
            'choice_label' => function(Professeur $professeur) {
                return $professeur->getPrenom() . ' '. $professeur->getNom();
        }]);
        

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Referent::class,
        ]);
    }
}
