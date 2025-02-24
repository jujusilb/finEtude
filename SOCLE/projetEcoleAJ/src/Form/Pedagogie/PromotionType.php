<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Promotion;
use App\Entity\Pedagogie\Matiere;
use App\Entity\Pedagogie\Programme;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Entity\Utilisateur\Professeur;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label'=>'Libellé de la promotion',
                'attr'=>[
                    'aria-label'=>'Libelle de la promotion',
                    'placejpmder'=>'libellé de la promotion',
                ]
            ])
            ->add('referent', EntityType::class, [
                'label'=>'Référent de la promotion',
                'class'=> Professeur::class,
                    'choice_label'=> function (Professeur $professeur){
                        return $professeur->getPrenom().' '.$professeur->getNom();
                },
                'attr'=>[
                    'aria-label'=>'Référent de la promotion',
                    'placeholder'=>'Choisissez un référent'
                ],
            ])

/*            
            ->add('promotion', EntityType::class, [
                'class' => Programme::class, [
                    'choice_label' => function(Programme $programme){
                        return $programme->getProfesseur()->getPrenom(). ' '.
                         $programme->getProfesseur()->getNom(). ' et '.
                         $programme->getMatiere()->getLibelle();
                    }
                ]
            ])
*/

            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
