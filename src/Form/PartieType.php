<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Joueur;
use App\Entity\Partie;
use App\Entity\Horraire;
use App\Form\JoueurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PartieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('horraire')
            ->add('salle')
           /* ->add('joueurs', CollectionType::class, [
                'entry_type' => JoueurType::class,
                'entry_option' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partie::class,
        ]);
    }
}
