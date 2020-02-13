<?php

namespace RefugeeBundle\Form;

//use Doctrine\DBAL\Types\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class refugieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')

            ->add('prenom')

            ->add('nationality', ChoiceType::class, array(
                'choices' => json_decode(
                //if builder is in controller, this should work
                    file_get_contents(__DIR__.'/../../../web/index/nationalities.json'),
                    true) ,
                'attr' => [ 'class' => 'selectpicker ', 'data-style' => 'select-with-transition']
            ))
            ->add('birthD', DateType::class, [
                'attr' => [ 'class' => 'form-control datetimepicker']
            ])

            ->add('birthLoc')

            ->add('sexe', ChoiceType::class, array(
                'choices' => json_decode(
                //if builder is in controller, this should work
                    file_get_contents(__DIR__.'/../../../web/index/gender.json'),
                    true) ,
                'attr' => [ 'class' => 'selectpicker', 'data-style' => 'select-with-transition']
            ))
            ->add('socialSit')

            ->add('img',FileType::class, array(
                'data_class' => null ,
                'attr' => ['class' => 'btn btn-primary ml-auto mr-auto'],

            ))
            ->add('camp',EntityType::class,array('class'=>'RefugeeBundle:Camp','choice_label'=>'libelle','multiple'=>false))

            ->add('Continuer',SubmitType::class,[
                'attr' => ['class' => 'btn btn-primary ml-auto mr-auto'],
            ]);
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RefugeeBundle\Entity\refugie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'refugeebundle_refugie';
    }


}
