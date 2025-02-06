<?php

namespace App\Form\Cuisine;

use App\Entity\Cuisine\Legume;
use App\Entity\Cuisine\Plat;
use App\Entity\Cuisine\Viande;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('viande', EntityType::class, [
                'class' => Viande::class,
                'choice_label' => 'id',
            ])
            ->add('legume', EntityType::class, [
                'class' => Legume::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
