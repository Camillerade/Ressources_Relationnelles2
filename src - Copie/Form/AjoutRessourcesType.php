<?php

namespace App\Form;

use App\Entity\Categorieressource;
use App\Entity\Typeressource;
use App\Entity\Ressource;
use App\Entity\Langue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class AjoutRessourcesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreressource',TextareaType::class,options:[
                'label'=>"Titre :"
               ])
            ->add('descriptionressource',TextareaType::class,options:[
                'label'=>"Description :"
               ])
            ->add('fichierressource',FileType::class,options:[
                'label'=>"fichier :",
                'required' => false,
                'mapped' => false
               ])
            ->add('langueressource',EntityType::class,[
                'class'=>Langue::class,
                'choice_label'=>'libellelangue',
                'label'=>'Langue :'
            ])
            ->add('categorieressource',EntityType::class,[
                'class'=>Categorieressource::class,
                'choice_label'=>'libellecategorie',
                'label'=>'Categorie :'
            ])
            ->add('typeressource',EntityType::class,[
                'class'=>Typeressource::class,
                'choice_label'=>'libelletyperessource',
                'label'=>'Ressource :'
            ])
            ->add('enregistrer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}
