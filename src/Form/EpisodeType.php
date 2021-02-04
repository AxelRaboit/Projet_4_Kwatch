<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('number')
            ->add('summary')
            ->add('imageFile', VichFileType::class, [
                'required'      => true,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri'  => false, // not mandatory, default is true

            ])
            ->add('season', EntityType::class, [ //TODO -> Complete the add to concaten and get an explicite select for the user
                'class' => Season::class,
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
