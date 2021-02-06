<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre']
            )
            ->add('number', IntegerType::class, [
                'label' => 'Numéro de l\'épisode'
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Sommaire de l\'épisode'
            ])
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image de l\'épisode',
                'required'      => false,
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
