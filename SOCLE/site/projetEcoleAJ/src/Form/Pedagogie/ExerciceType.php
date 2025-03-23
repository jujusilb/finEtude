<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Exercice;
use App\Entity\Pedagogie\Matiere;
use App\Entity\Pedagogie\Promotion;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Pedagogie\MatiereRepository;
use App\Entity\Utilisateur\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ExerciceType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Libellé de l\'exercice',
                'attr' => [
                    'aria-label' => 'Libellé de l\'exercice',
                    'placeholder' => 'Libellé de l\'exercice'
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu de l\'exercice',
                'attr' => [
                    'aria-label' => 'Contenu de l\'exercice',
                    'placeholder' => 'Contenu de l\'exercice'
                ]
            ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                'choice_label' => 'libelle',
                'query_builder' => function (PromotionRepository $promotionRepo) use ($options) {
                    return $promotionRepo->createQueryBuilder('promotion')
                        ->orderBy('promotion.libelle', 'ASC');
                },
                'placeholder' => 'Sélectionnez une promotion',
            ])
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'libelle',
            ]);
    
        // Écouteur d'événement pour filtrer les promotions en fonction du professeur
        $builder->get('promotion')
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                function (FormEvent $event) use ($options) {
                    $form = $event->getForm();
                    $professeurId = $options['professeur_id'] ?? null;
    
                    if ($professeurId) {
                        // Modify the query builder for the 'promotion' field dynamically
                        $form->getConfig()->getOptions()['query_builder'] = function (PromotionRepository $promotionRepo) use ($professeurId) {
                            return $promotionRepo->createQueryBuilder('promotion')
                                ->select("concat(prof.nom, ' ', prof.prenom)") // Concatenation du nom et prénom
                                ->innerJoin('promotion.programmes', 'prog') // Jointure avec la table Programme
                                ->innerJoin('prog.professeur', 'prof') // Jointure avec la table Professeur
                                ->where('prof.id = :professeurId')
                                ->setParameter('professeurId', $professeurId)
                                ->orderBy('promotion.libelle', 'ASC');
                        };
                    }
                }
            );
    }

}
