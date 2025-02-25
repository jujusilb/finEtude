<?php

namespace App\Form\Etablissement;

use App\Entity\Etablissement\Pole;
use App\Entity\Utilisateur\Personnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;

class PoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle', TextType::class, [
            'label'=> 'Libellé du Pôle',
            'attr'=> [
                'aria-label' =>'Libellé du Pôle',
                'placeholder'=>'Libellé du Pôle'
            ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pole::class,
        ]);
    }
}
