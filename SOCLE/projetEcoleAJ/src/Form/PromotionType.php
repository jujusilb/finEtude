<?php

namespace App\Form;

use App\Entity\Promotion;
use App\Entity\Referent;
use App\Entity\Professeur;
use App\Entity\Matiere;
use App\Entity\Programme;
use App\Entity\ProfesseurMatiere;
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
            ->add('libelle', TextType::class, [])

            ->add('referent', EntityType::class, [
                'class' => Referent::class,
                'choice_label' => function(Referent $referent) {
                    return $referent->getProfesseur()->getPrenom() . ' ' . $referent->getProfesseur()->getNom(); // Afficher le prénom et le nom
                }])
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
            ->add('programme', EntityType::class, [
                'class' => Programme::class,
                'choice_label' => function(Programme $programme) {
                    return $programme->getProfesseur()->getPrenom() . ' ' . $programme->getProfesseur()->getNom() . ' et ' . $programme->getMatiere()->getLibelle();
                },  
                'multiple' => true,
                'expanded' => true,
            ], 
        )
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
