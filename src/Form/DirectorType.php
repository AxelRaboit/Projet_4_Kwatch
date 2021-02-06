<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Program;
use App\Entity\Director;
use App\Repository\CountryRepository;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DirectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('pictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ])
            ->add('nationality', EntityType::class, [
                'label' => 'Nationalité',
                'class' => Country::class,
                'choice_label' => 'nom_fr_fr',
                'query_builder' => function (CountryRepository $query) {
                    return $query->createQueryBuilder('c')
                            ->orderBy('c.nom_fr_fr', 'ASC');
                },
            ])
            ->add('description')
            ->add('program', EntityType::class, [
                'required' => false,
                'label' => 'Série',
                'class' => Program::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Director::class,
        ]);
    }
}
