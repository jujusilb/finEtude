<?php

namespace App\Form\Cantine;

use App\Entity\Cantine\Legume;
use App\Entity\Cantine\Plat;
use App\Entity\Cantine\Viande;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle', TextType::class, [
            'label' => 'Libellé du plat',
            'attr' =>[
                'aria-label' => 'Libellé du plat',
                'placeholder' => 'Libellé du plat'
            ]
        ])
            ->add('viande', EntityType::class, [
                'class' => Viande::class,
                'choice_label' => 'libelle',
                'placeholder' => 'choisissez de la viande',
                'attr' =>[
                    'aria-label' => 'Libellé du plat',
                ]
            ])
            ->add('legume', EntityType::class, [
                'class' => Legume::class,
                'choice_label' => 'libelle',
                'placeholder' => 'Choisissez un légume',
                'attr' =>[
                    'aria-label' => 'Libellé du plat',
                ]
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
