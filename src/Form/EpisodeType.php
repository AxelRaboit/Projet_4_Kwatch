<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\Episode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('number')
            ->add('summary')
            ->add('poster')
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'number',
                'label' => 'Saison'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
        ]);
    }
}
