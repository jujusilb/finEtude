<?php

namespace App\Form\Boutique;

use App\Entity\Boutique\Commande;
use App\Entity\Boutique\Produit;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity')
            ->add('prixTotal')
            ->add('dateAchat', null, [
                'widget' => 'single_text'
            ])
            ->add('membre', EntityType::class, [
                'class' => Membre::class,
'choice_label' => 'id',
            ])
            ->add('Produit', EntityType::class, [
                'class' => Produit::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
