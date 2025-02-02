<?php

namespace App\Form;

use App\Entity\Membre;
use App\Entity\Menu;
use App\Entity\Repas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix')
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
'choice_label' => 'id',
            ])
            ->add('membre', EntityType::class, [
                'class' => Membre::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}
