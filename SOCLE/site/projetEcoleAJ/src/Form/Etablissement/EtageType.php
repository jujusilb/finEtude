<?php

namespace App\Form\Etablissement;

use App\Entity\Etablissement\Batiment;
use App\Entity\Etablissement\Etage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
            'label'=> 'Libellé de l\'étage',
            'attr'=> [
                'aria-label' =>'Libellé de l\'étage',
                'placeholder'=>'Libellé de l\'étage'
            ]])
            ->add('batiment', EntityType::class, [
                'class' => Batiment::class,
                'choice_label' => 'libelle',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etage::class,
        ]);
    }
}
