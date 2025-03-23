<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Matiere;
use App\Entity\Utilisateur\Professeur;

use App\Entity\Pedagogie\Programme;
use App\Entity\Pedagogie\Promotion;
use App\Entity\Pedagogie\ProfesseurMatiere;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgrammeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('professeurMatiere', EntityType::class, [
            'class'=>ProfesseurMatiere::class,
            'choice_label'=>function (ProfesseurMatiere $profMat){
                return $profMat->getProfesseur()->getPrenom().' '.$profMat->getProfesseur()->getNom().' - '.$profMat->getMatiere()->getLibelle();
            },
                'mapped'=>false,
           ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                    'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Programme::class,
        ]);
    }
}
