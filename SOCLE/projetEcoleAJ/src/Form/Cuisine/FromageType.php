<?php

namespace App\Form\Cantine;

use App\Entity\Cantine\Fromage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FromageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle', TextType::class, [
            'label' => 'Libellé du fromage',
            'attr' =>[
                'aria-label' => 'Libellé du fromage',
                'placeholder' => 'Libellé du fromage'
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fromage::class,
        ]);
    }
}
