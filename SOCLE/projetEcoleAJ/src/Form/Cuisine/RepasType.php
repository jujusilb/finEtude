<?php

namespace App\Form\Cuisine;

use App\Entity\Utilisateur\Membre;
use App\Entity\Cuisine\Menu;
use App\Entity\Cuisine\Repas;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class RepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
           ->add('date', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('heure', ChoiceType::class, [
                'choices' => [
                'Midi' => 'Midi',
                'Soir' => 'Soir',
                ]
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => 'id',
            ])
            ->add('prix', MoneyType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}
