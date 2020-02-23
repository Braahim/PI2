<?php

namespace StockBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('quantite')
            ->add('date')
            ->add('Stock',EntityType::class,array(
                'class'=>'StockBundle:Stock',
                'choice_label'=>'type',
                'multiple'=>false
            ))
            ->add('Ajouter',SubmitType::class,[
                'attr'=>['class'=> 'btn btn-primary pull-right','style'=> 'margin-left: 200px; font-size: 16px; width: 140px;margin-bottom:150px;']
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StockBundle\Entity\Don'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'stockbundle_don';
    }


}
