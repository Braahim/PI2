<?php

namespace RefugeeBundle\Form;

use RefugeeBundle\Entity\camp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class campType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle',TextType::class , array(
            'attr' => ['class' => 'form-control'],
        ))
                ->add('location',TextType::class , array(
                'attr' => ['class' => 'form-control'],
                ))
                ->add('capacity',TextType::class, array(
                    'attr' => ['class' => 'form-control'],
                ))
                ->add('Continuer',SubmitType::class,[
                    'attr' => ['class' => 'btn btn-primary ml-auto mr-auto'],
                ]);
               /* ->addEventListener(
            FormEvents::PRE_SET_DATA,
            array($this, 'onPreSetData')
    );*/
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RefugeeBundle\Entity\camp'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'refugeebundle_camp';
    }

    /*public function onPreSetData(FormEvent $event)
    {

        // get the form
        $form = $event->getForm();

        // get the data if 'reviewing' the information
        /**
         * @var Invoices
         */
     /*   $data = $event->getData();

        // disable field if it has been populated with a client already
        if ( $data->getCamp() instanceof camp )
            $form->add('libelle',TextType::class , array(
                'attr' => ['class' => 'form-control'],
            ))
                ->add('location',TextType::class , array(
                    'attr' => ['class' => 'form-control'],
                ))
                ->add('capacity',TextType::class, array(
                    'attr' => ['class' => 'form-control'],
                ))
                ->add('Continuer',SubmitType::class,[
                    'attr' => ['class' => 'btn btn-primary ml-auto mr-auto'],
                ]);

    }*/



}
