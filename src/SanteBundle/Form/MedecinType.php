<?php

namespace SanteBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nCIN')->add('nonMedecin')->add('prenomMedecin')->add('telephone')
            ->add('specialite', EntityType::class, array('class'=>'SanteBundle:Specialite','choice_label'=>'nomSpecialite','multiple'=>false))
            ->add('Ajouter',SubmitType::class,[
                'attr'=>['class'=> 'btn btn-primary pull-right','style'=> 'margin-left: 200px; font-size: 16px; width: 140px;margin-bottom:180px;background-color:#5ad25f;']
            ]);;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SanteBundle\Entity\Medecin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'santebundle_medecin';
    }


}
