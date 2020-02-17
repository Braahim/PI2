<?php

namespace DonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreDem')
            ->add('descDem')
            ->add('montantDem')
            ->add('delaiFinal')
            ->add('Publier',SubmitType::class,[
                'attr'=>['class'=> 'btn btn-primary pull-right','style'=> 'margin-left: 200px; font-size: 16px; width: 140px;margin-bottom:180px;background-color:#5ad25f;']
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DonBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'donbundle_demande';
    }


}
